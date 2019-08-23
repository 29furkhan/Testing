<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use DB;


class connect extends Controller
{
    public function insertData(Request $request){
        
        $input = $request->all();
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $caserp_id = $_POST['caserp_id'];

        $caserp_id_exist = Test::where('caserp_id','=',$input['caserp_id'])->exists();

        if(empty($caserp_id))
        {
            $response = array("alert"=>"alert-danger", "data"=>"Enter CASERP_ID");
            return $response;
        }

        if(empty($first_name))
        {
            $response = array("alert"=>"alert-danger", "data"=>"Enter First_Name");
            return $response;
        }

        if(empty($last_name))
        {
            $response = array("alert"=>"alert-danger", "data"=>"Enter Last_Name");
            return $response;
        }

        if($caserp_id_exist)
        {
            $response = array("alert"=>"alert-danger", "data"=>"Duplicate Record Found for ".$caserp_id);
            return $response;
        }
        else
        {
            DB::table('tests')->insert(
                ['first_name' => $first_name,
                 'last_name' => $last_name,
                 'caserp_id' => $caserp_id
                ]
            );
            $response = array("alert"=>"alert-success", "data"=>"Your Account has been Created Successfully!!!");
            return $response;
        }
    
    }
    
}
