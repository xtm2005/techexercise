<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class CheckApi extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCheckEndpointWithNoData() {
        $this->json('GET','api/tech_exercise/get_all_records')->assertStatus(200);
    }

     public function testPostNewKeyValue()
    {
        //Insert first object
        $response = $this->postJson('/api/tech_exercise', ['FirstKey' => '1st Value'])->assertStatus(201);
        sleep(1);
        //Retrieve first object and check Key Name
        $response = $this->getJson('/api/tech_exercise/FirstKey')->
            assertStatus(200)->
                assertJson([
                    'keyName' => 'FirstKey'
            ]);
        $firstData= $this->getJson('/api/tech_exercise/FirstKey');
        
        
        //Try to update the same value.
        $response = $this->postJson('/api/tech_exercise', ['FirstKey' => '1st Value'])->assertStatus(201)->
            assertJson([
                "message" => 'You are trying to update with the same value'
            ]);
        // Alter the value
        $response = $this->postJson('/api/tech_exercise', ['FirstKey' => '1st Altered Value'])->assertStatus(201);
        //retrieve first version and check original key value
        $response = $this->getJson('/api/tech_exercise/FirstKey?timestamp='.$firstData['version'])->
        assertStatus(200)->
            assertJson([
                'value' => '1st Value'
        ]);

        //Create secondary post.
        $response = $this->postJson('/api/tech_exercise', ['SecondKey' => '2nd Value'])->assertStatus(201);
        $response = $this->getJson('/api/tech_exercise/SecondKey')->
            assertStatus(200)->
                assertJson([
                    'keyValue' => '2nd Value'
            ]);
        
    }

    public function testUpdateValues()
    {

        $response = $this->postJson('/api/tech_exercise', ['SecondKey' => '2nd Altered Value'])->assertStatus(201);
        $response = $this->getJson('/api/tech_exercise/SecondKey')->assertJson([
            'keyName'=>'SecondKey',
            'keyValue'=>'2nd Altered Value'
        ])->assertStatus(200);
        

        $response = $this->postJson('/api/tech_exercise', ['ThirdKey' => '3rd New Entry'])->assertStatus(201);
    }

    public function testCheckEndpoint() {
        $this->json('GET','api/tech_exercise/get_all_records')->assertStatus(200);

    }
    public function testEmptyPost() {
        $response=$this->post('api/tech_exercise')->assertStatus(500);
    }

}
