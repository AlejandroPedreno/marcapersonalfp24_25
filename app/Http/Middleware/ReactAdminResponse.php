<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReactAdminResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->merge(['perPage' => 10]);
        if($request->filled('_start')) {
            if($request->filled('_end')) {
                $request->merge(['perPage' => $request->_end - $request->_start + 1]);
            }
            $request->merge(['page' => intval($request->_start / $request->perPage) + 1]);
        }

        $response = $next($request);

        if($request->routeIs('*.index')) {
            abort_unless(property_exists($request->route()->controller, 'modelclass'), 500, "It must exists a modelclass property in the controller.");
            abort_unless(property_exists($request->route()->controller, 'resourceClass'), 500, "It must exist a resourceClass property in the controller.");
            $controller = $request->route()->controller;
            $modelClassName = $controller->modelClass;
            $resourceClassName = $controller->resourceClass;
            $response->header('X-Total-Count',$modelClassName::count());

            return $resourceClassName->collection(
            $modelClassName::orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage)
        ); //????


        }
        try {
            if(is_callable([$response, 'getData'])) {
                $responseData = $response->getData();
                if(isset($responseData->data)) {
                    $response->setData($responseData->data);
                }
            }
        } catch (\Throwable $th) { }
        return $response;
    }


/* public function index(Request $request, $filterColumns)
    {
        $modelClassName = $request->route()->controller->modelclass;
        $query = $modelClassName::query();

        $filterValue = $request->q;

        if ($filterValue) {
            $query->where(function ($query) use ($filterValue, $filterColumns) {
                foreach ($filterColumns as $column) {
                    $query->orWhere($column, 'like', '%' . $filterValue . '%');
                }
            });
        }

        $sort = $request->_sort;
        $order = $request->_order;
        if ($sort) {
            $query->orderBy($sort, $order);
        }

        return $query->paginate($request->perPage);
    }
}*/
}
