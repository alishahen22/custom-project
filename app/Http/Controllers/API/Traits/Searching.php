<?php

namespace App\Http\Controllers\Api\Traits;

trait Searching
{
    public function AdvanceSearch($model, $columns, $request)
    {

        $query = $model->query();
        if ($columns) {
            /*
				 for loop columns to get all fields
			*/

            foreach ($columns as $column => $searchtype) {
                $query->where(function ($q) use ($column, $request, $searchtype) {

                    /*
						Check Type of Search by key in array like ( like , = , or , whereHas)
					*/

                    if ($column == 'keyword' && $searchtype == 'keyword') {
                        $q->where('name', 'like', '%' . $request->keyword . '%')->Orwhere('description', 'like', '%' . $request->keyword . '%');
                    }

                    if ($column == 'keyword' && $searchtype == 'like') {
                        $q->where('order_ship_name', 'like', '%' . $request->keyword . '%')->Orwhere('order_ship_address', 'like', '%' . $request->keyword . '%');
                    }

                    if ($column == 'store' && $searchtype == 'like') {
                        $q->where([['first_name', 'like', '%' . $request->keyword . '%'], ['name_company', '!=', null]])->Orwhere('name_company', 'like', '%' . $request->keyword . '%')->Orwhere('last_name', 'like', '%' . $request->keyword . '%')->whereHas('roles', function ($q) {
                            $q->where('name', 'owner_store');
                        });
                    }

                    // if ($searchtype == '=' && isset($request->{$column})) {
                    //     $q->where($column, $request->{$column});
                    // }
                    // if ($searchtype == 'like' && isset($request->{$column})) {
                    //     $q->where($column, 'like', '%' . $request->{$column} . '%');
                    // }

                });
            }
        }
        $query = $query->get();
        return $query;
    }
}
