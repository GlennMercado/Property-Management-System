@echo off

php artisan migrate --path=database\migrations\2014_10_12_000000_create_users_table.php

php artisan migrate --path=database\migrations\2022_12_06_140802_create_novadeci_suites_table.php

php artisan migrate --path=database\migrations\2022_12_06_000949_create_hotel_reservation_table.php

php artisan migrate --path=database\migrations\2023_02_09_164155_create_guest_requests_table.php

php artisan migrate --path=database\migrations\2023_03_23_113345_create_guest_folio_table.php

php artisan migrate --path=database\migrations\2023_02_04_195723_create_convention_center_applications_table.php

php artisan migrate --path=database\migrations\2023_02_09_204322_create_commercial_spaces_application_table.php

php artisan migrate --path=database\migrations\2022_12_09_050205_create_hotelstocks_table.php

php artisan migrate --path=database\migrations\2023_04_07_143938_create_used_supplies_table.php

php artisan migrate --path=database\migrations\2023_04_16_231547_create_hotel_other_charges_table.php

php artisan migrate --path=database\migrations\2023_04_09_143246_create_notifications_table.php

php artisan migrate --path=database\migrations\2023_04_24_173156_create_commercial_space_units_table.php

php artisan migrate --path=database\migrations\2023_04_17_144721_create_commercial_spaces_tenants_table.php

php artisan migrate --path=database\migrations\2023_04_22_050938_create_commercial_space_rent_reports_table.php

php artisan migrate --path=database\migrations\2023_04_23_204518_create_commercial_spaces_tenant_deposits_table.php

php artisan migrate --path=database\migrations\2023_04_24_155243_create_commercial_spaces_tenant_reports_table.php

php artisan migrate --path=database\migrations\2023_04_25_174511_create_commercial_space_unit_reports_table.php

php artisan migrate --path=database\migrations\2023_04_25_185938_create_commercial_space_utility_bills_table.php

php artisan migrate

echo All migrations have been run successfully.
