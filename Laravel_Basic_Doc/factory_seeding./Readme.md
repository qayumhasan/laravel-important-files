# Create A factory ##
## Write This command
  ```
  php artisan make:factory PostFactory
  ```
## It Create a postfactory.php file inside database->factory
## Write code like this on it
  ```
  /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date($format = 'd-m-Y', $max = 'now'),
            'room_no' => $this->faker->unique()->numberBetween($min = 100, $max = 1000),
            'room_status' => 1,
            'branch_id' => $this->faker->numberBetween($min = 2, $max = 3),
            'room_type' => $this->faker->numberBetween($min = 1, $max = 3),
            'floor' => $this->faker->numberBetween($min = 1, $max = 6),
            'toilet' => 'English',
            'tariff' => $this->faker->numberBetween($min = 100, $max = 1000),
            'category' =>'Employee',
            'is_active' =>1,
            'is_deleted' =>0,
        ];
    }
  ```
## Write this command for makeing a seeder
  ```
  php artisan make:seeder UserSeeder
  ```
## Write below code in UserSeeder.php
  ```
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::factory(50)->create();
    }
  ```
  
