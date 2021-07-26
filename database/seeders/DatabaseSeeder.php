<?php

namespace Database\Seeders;

use App\Models\LookupType;
use App\Models\LookupValue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run ()
    {
        $lookupType = array(
            [
                'id'          => 1,
                'name'        => "Loan status",
                'description' => "Different status of loan",
            ],
            [
                'id'          => 2,
                'name'        => "Payment Status",
                'description' => "Different payment status",
            ],
        );

        $lookupValue = array(
            [
                'id'             => 1,
                'name'           => "NEW",
                'description'    => "NEW",
                'value'          => 1,
                'lookup_type_id' => 1,
            ],
            [
                'id'             => 2,
                'name'           => "APPROVED",
                'description'    => "APPROVED",
                'value'          => 1,
                'lookup_type_id' => 1,
            ],
            [
                'id'             => 3,
                'name'           => "CLOSED",
                'description'    => "CLOSED",
                'value'          => 1,
                'lookup_type_id' => 1,
            ],
            [
                'id'             => 4,
                'name'           => "REJECTED",
                'description'    => "REJECTED",
                'value'          => 1,
                'lookup_type_id' => 1,
            ],
            [
                'id'             => 5,
                'name'           => "PENDING",
                'description'    => "PENDING",
                'value'          => 1,
                'lookup_type_id' => 2,
            ],
            [
                'id'             => 6,
                'name'           => "PAID",
                'description'    => "PAID",
                'value'          => 1,
                'lookup_type_id' => 2,
            ],
            [
                'id'             => 7,
                'name'           => "MISSED",
                'description'    => "MISSED",
                'value'          => 1,
                'lookup_type_id' => 2,
            ],
        );

        LookupType::insert($lookupType);
        LookupValue::insert($lookupValue);
    }
}
