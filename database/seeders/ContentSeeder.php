<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::create([
            'name'=>'banner',
            'content'=>json_encode([ 
            'sub_title'=>'EVERY CHILD YEARNS TO LEARN',
            'title'=>'Making Your Childs World Better',
            'desc'=>"Replenish seasons may male hath fruit beast were seas saw you arrie said man beast whales his void unto last session for bite. Set have great you'll male grass yielding yielding man"])
           

        ]);
    }
}
