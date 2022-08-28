<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerCategory;

class SupplierCustomerController extends Controller
{
    public function showcustomercategory(){
        return view('backend.supplier_customer.customer_category.index');
    }
    public function store(Request $request){
        CustomerCategory::create([
            'name' => $request->name,
            
         ]);
         return response()->json([
            'status'=>200
           ]);
    }
    public function allcustomercateogry(){
        $data=CustomerCategory::latest()->get();
        $i=1;
        foreach($data as $ccat){
            ?>
<tr>
    <td><?php echo $i;$i++ ?></td>
    <td><?php echo $ccat->name ?></td>

    <td>
        <a class="btn btn-warning btn-sm"><i
                class="fa fa-pencil-square-o  text-light " style="font-size:20px" aria-hidden="true"></i>
        </a>
        <a class="btn btn-light btn-sm" id="delete_category" category_id="{{ $d->id }}"
            data-confirm="Are you sure to delete this item?" href=""><i class="fa fa-trash text-danger"
                style="font-size:20px" aria-hidden="true"></i>
        </a>
    </td>
</tr>

<?php
        }
    }
}