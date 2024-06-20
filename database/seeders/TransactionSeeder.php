<?php

namespace Database\Seeders;

use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Http\Client\Request;
use PHPHtmlParser\Dom;
use PhpParser\Node;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $dom = new Dom();
        $dom->loadFromUrl('https://html.test.2024.na4u.ru/');
        /** @var Dom $iterator */
        foreach ($dom->getElementsByTag('tbody')->getIterator() as $iterator) {
            foreach ($iterator->getChildren() as $tr) {
                $tableData = [];
                $tableData['id'] = $tr[0];
                /** @var Dom\HtmlNode $td */
                foreach($tr->getChildren() as $td) {
                    $td->

                }
            }
        }
    }
}
