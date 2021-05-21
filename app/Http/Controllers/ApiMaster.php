<?php

namespace App\Http\Controllers;
use App\keystore;
use App\KeyVersioning;

use Carbon\Carbon;

use Illuminate\Http\Request;

class ApiMaster extends Controller
{
    public function getAllResults() {
        $result= keystore::all();
        return $result;
    }

    public function createEntry(Request $request) {
         $data = json_decode($request->getContent(), true);
         $keytocheck= key($data);

        //add some validations here if > key value store;
        $result  = keystore::where('keyName',$keytocheck)->get();
        //using where will return collection not an object
        $currenttime= now();
        $current_timestamp  = $currenttime->timestamp;
        if ($result->count() > 0)  {

            if ($result[0]->keyValue ==$data[key($data)]) {
                return response()->json([
                    "message" => 'You are trying to update with the same value'
                    ], 201);
            }
            $keyVersion = new KeyVersioning;
            $keyVersion->keyId = $result[0]->id;
            $keyVersion->value = $result[0]->keyValue;
            $keyVersion->version = $result[0]->version;
            $keyVersion->save();
            
            //check if key exists 
            $result[0]->keyValue =$data[key($data)];
            $result[0]->version = $current_timestamp;
            $result[0]->update();
            $message='updated at ';
        }
        //else createnew entry
        else {
            $keyStore = new keystore;
            $keyStore->keyName = $keytocheck;
            $keyStore->keyValue =$data[key($data)];
            
            $keyStore->version =  $current_timestamp;
            $keyStore->save();
            $message='created at ';
        }
    
        return response()->json([
        "message" => $message . $currenttime . ' : timestamp value = ' . $current_timestamp
        ], 201);
    
    }
    public function retrieve(Request $request, $keyName) {
        $result  = keystore::where('keyName',$keyName)->get();
        if (is_null($request['timestamp'])) {
            return $result[0]->keyValue;
        }
        else
        {
            $result = KeyVersioning::where('KeyId',$result[0]->id)->where('version',$request['timestamp'])->get();
            if ($result->count()>0) 
                return $result[0]->value;            
            else
                return 'No version found with the timestamp provided';
        }
        
    }

    public function retrieveVersions() {
        //create new table and see if relationships is available in laravel.
    }

}
