<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LunchControllerTest extends WebTestCase
{
    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function test_now()
    {
        $this->client->request('GET', '/lunch');
        $response = '{"error":false,"code":200,"message":null,"data":[{"title":"Ham and Cheese Toastie","ingredients":["Ham","Cheese","Bread","Butter"]},{"title":"Salad","ingredients":["Lettuce","Tomato","Cucumber","Beetroot","Salad Dressing"]},{"title":"Hotdog","ingredients":["Hotdog Bun","Sausage","Ketchup","Mustard"]}]}';

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertEquals($response, $this->client->getResponse()->getContent());        
    }

    public function test_2019_03_25()
    {
        $this->client->request('GET', '/lunch?use-by=2019-03-25');
        $response = '{"error":false,"code":200,"message":null,"data":[{"title":"Hotdog","ingredients":["Hotdog Bun","Sausage","Ketchup","Mustard"]}]}';

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertEquals($response, $this->client->getResponse()->getContent());        
    }

    public function test_2019_03_07()
    {
        $this->client->request('GET', '/lunch?use-by=2019-03-07');
        $response = '{"error":false,"code":200,"message":null,"data":[{"title":"Ham and Cheese Toastie","ingredients":["Ham","Cheese","Bread","Butter"]},{"title":"Salad","ingredients":["Lettuce","Tomato","Cucumber","Beetroot","Salad Dressing"]},{"title":"Hotdog","ingredients":["Hotdog Bun","Sausage","Ketchup","Mustard"]}]}';

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertEquals($response, $this->client->getResponse()->getContent());        
    }

    public function test_2019_03_28()
    {
        $this->client->request('GET', '/lunch?best-before=2019_03_28');
        $response = '{"error":false,"code":200,"message":null,"data":[{"title":"Ham and Cheese Toastie","ingredients":["Ham","Cheese","Bread","Butter"]},{"title":"Salad","ingredients":["Lettuce","Tomato","Cucumber","Beetroot","Salad Dressing"]},{"title":"Hotdog","ingredients":["Hotdog Bun","Sausage","Ketchup","Mustard"]}]}';

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertEquals($response, $this->client->getResponse()->getContent());        
    }


}
