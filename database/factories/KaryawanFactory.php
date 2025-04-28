<?php

namespace Database\Factories;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Karyawan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_karyawan' => $this->faker->name(),
            'bidang_keahlian' => $this->faker->randomElement(['Desain', 'Programming', 'Marketing', 'Penulisan']),
            'email' => $this->faker->unique()->safeEmail(),
            'nomor_telepon' => $this->faker->phoneNumber(),
            'tanggal_mulai' => $this->faker->date(),
            'durasi_kontrak' => $this->faker->numberBetween(1, 12),
            'status' => $this->faker->randomElement(['aktif', 'tidak aktif', 'selesai']),
        ];
    }
}
