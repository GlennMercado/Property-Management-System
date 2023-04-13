<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->dropView());
    }
    private function createView(): string
    {
        return <<< SQL
            CREATE VIEW view_hotel_room_supplies AS
                SELECT
                id,
                hotel_room_supplies.Room_No,
                hotel_room_supplies.productid,
                hotel_room_supplies.name,
                hotel_room_supplies.Quantity,
                hotel_room_supplies.Quantity_Requested,
                hotel_room_supplies.Attendant,
                hotel_room_supplies.Date_Requested,
                hotel_room_supplies.Status,
                hotel_room_supplies.Remarks
                FROM
                hotel_room_supplies
            SQL;
    }

    private function dropView(): string
    {
        return <<< SQL
            DROP VIEW IF EXISTS `view_hotel_room_supplies`;
            SQL;
    }
};
