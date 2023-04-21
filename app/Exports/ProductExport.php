<?php

namespace App\Exports;

use App\Models\ProductLists;
use Maatwebsite\Excel\Concerns\FromCollection;


class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProductLists::all();
    }


    /**
     * Write code on Method
     *
     * @return response()
     */

    public function headings(): array
    {
        return [
            'id',
            'seller_code',
            'product_type',
            'provider_id',
            'category_id',
            'url',
            'title',
            'product_tag1',
            'product_tag2',
            'product_tag3',
            'price',
            'media_url',
            'featured_image_url',
            'card_description',
            'license1_Tier_price',
            'license1_Tier_features',
            'license2_Tier_price',
            'license2_Tier_features',
            'license3_Tier_price',
            'license3_Tier_features',
            'tldr',
            'About_all',
        ];

    }
}
