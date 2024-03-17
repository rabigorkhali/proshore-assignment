<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [];

        // Physics questions
        $physicsQuestions = [
            [
                'subject' => 'Physics',
                'question' => 'What is the formula to calculate force?',
                'options' => json_encode([
                    ['a' => 'F = ma'],
                    ['b' => 'F = mv^2'],
                    ['c' => 'F = p/t'],
                    ['d' => 'F = w/d'],
                ]),
                'correct_answer' => 'a',
            ],
            [
                'subject' => 'Physics',
                'question' => 'What is the SI unit of pressure?',
                'options' => json_encode([
                    ['a' => 'Pascal'],
                    ['b' => 'Newton'],
                    ['c' => 'Joule'],
                    ['d' => 'Watt'],
                ]),
                'correct_answer' => 'a',
            ],
            [
                'subject' => 'Physics',
                'question' => 'What is the law of conservation of energy?',
                'options' => json_encode([
                    ['a' => 'Energy can be created but not destroyed'],
                    ['b' => 'Energy can be neither created nor destroyed, only transformed from one form to another'],
                    ['c' => 'Energy can only be stored in batteries'],
                    ['d' => 'Energy can be converted into matter'],
                ]),
                'correct_answer' => 'b',
            ],
            [
                'subject' => 'Physics',
                'question' => 'What is the speed of light in a vacuum?',
                'options' => json_encode([
                    ['a' => '300,000 m/s'],
                    ['b' => '150,000 m/s'],
                    ['c' => '3,000,000 m/s'],
                    ['d' => '30,000,000 m/s'],
                ]),
                'correct_answer' => 'a',
            ],
            [
                'subject' => 'Physics',
                'question' => 'What is the formula to calculate kinetic energy?',
                'options' => json_encode([
                    ['a' => 'KE = mgh'],
                    ['b' => 'KE = 1/2 mv^2'],
                    ['c' => 'KE = Fd'],
                    ['d' => 'KE = P/t'],
                ]),
                'correct_answer' => 'b',
            ],
            [
                'subject' => 'Physics',
                'question' => 'Which of the following is a vector quantity?',
                'options' => json_encode([
                    ['a' => 'Mass'],
                    ['b' => 'Temperature'],
                    ['c' => 'Acceleration'],
                    ['d' => 'Energy'],
                ]),
                'correct_answer' => 'c',
            ],
            [
                'subject' => 'Physics',
                'question' => 'What is the SI unit of electric current?',
                'options' => json_encode([
                    ['a' => 'Ampere'],
                    ['b' => 'Volt'],
                    ['c' => 'Ohm'],
                    ['d' => 'Watt'],
                ]),
                'correct_answer' => 'a',
            ],
            [
                'subject' => 'Physics',
                'question' => 'What is the formula to calculate momentum?',
                'options' => json_encode([
                    ['a' => 'P = mv'],
                    ['b' => 'P = Fd'],
                    ['c' => 'P = ma'],
                    ['d' => 'P = KE/t'],
                ]),
                'correct_answer' => 'a',
            ],
            [
                'subject' => 'Physics',
                'question' => 'What is Newton\'s third law of motion?',
                'options' => json_encode([
                    ['a' => 'Every action has an equal and opposite reaction'],
                    ['b' => 'An object in motion tends to stay in motion unless acted upon by an external force'],
                    ['c' => 'Force equals mass times acceleration'],
                    ['d' => 'Energy is conserved in a closed system'],
                ]),
                'correct_answer' => 'a',
            ],
            [
                'subject' => 'Physics',
                'question' => 'What is the unit of power?',
                'options' => json_encode([
                    ['a' => 'Watt'],
                    ['b' => 'Newton'],
                    ['c' => 'Joule'],
                    ['d' => 'Ampere'],
                ]),
                'correct_answer' => 'a',
            ],
            [
                'subject' => 'Physics',
                'question' => 'What is the formula to calculate acceleration?',
                'options' => json_encode([
                    ['a' => 'a = v/t'],
                    ['b' => 'a = s/t'],
                    ['c' => 'a = F/m'],
                    ['d' => 'a = v/s'],
                ]),
                'correct_answer' => 'a',
            ],
            [
                'subject' => 'Physics',
                'question' => 'What is the formula for Ohm\'s Law?',
                'options' => json_encode([
                    ['a' => 'V = IR'],
                    ['b' => 'R = VI'],
                    ['c' => 'I = VR'],
                    ['d' => 'R = V/I'],
                ]),
                'correct_answer' => 'd',
            ],
            [
                'subject' => 'Physics',
                'question' => 'What is the formula for work done?',
                'options' => json_encode([
                    ['a' => 'W = Fd'],
                    ['b' => 'W = Pt'],
                    ['c' => 'W = KE/t'],
                    ['d' => 'W = mgh'],
                ]),
                'correct_answer' => 'a',
            ],
            [
                'subject' => 'Physics',
                'question' => 'What is the law of universal gravitation?',
                'options' => json_encode([
                    ['a' => 'Every object in the universe is attracted to every other object'],
                    ['b' => 'The force of gravity is directly proportional to the distance between objects'],
                    ['c' => 'The force of gravity is inversely proportional to the square of the distance between objects'],
                    ['d' => 'Gravity only affects objects with mass'],
                ]),
                'correct_answer' => 'c',
            ],
        ];

        // Chemistry questions
        $chemistryQuestions = [
            [
                'subject' => 'Chemistry',
                'question' => 'What is the chemical symbol for gold?',
                'options' => json_encode([
                    ['a' => 'Au'],
                    ['b' => 'Ag'],
                    ['c' => 'Fe'],
                    ['d' => 'Cu'],
                ]),
                'correct_answer' => 'a',
            ],
            [
                'subject' => 'Chemistry',
                'question' => 'What is the pH of a neutral solution?',
                'options' => json_encode([
                    ['a' => '7'],
                    ['b' => '0'],
                    ['c' => '14'],
                    ['d' => '5'],
                ]),
                'correct_answer' => 'a',
            ],
            [
                'subject' => 'Chemistry',
                'question' => 'What is the chemical formula for water?',
                'options' => json_encode([
                    ['a' => 'H2O2'],
                    ['b' => 'CO2'],
                    ['c' => 'H2O'],
                    ['d' => 'HCl'],
                ]),
                'correct_answer' => 'c',
            ],
            [
                'subject' => 'Chemistry',
                'question' => 'What is the process of converting a solid directly into a gas called?',
                'options' => json_encode([
                    ['a' => 'Evaporation'],
                    ['b' => 'Sublimation'],
                    ['c' => 'Condensation'],
                    ['d' => 'Deposition'],
                ]),
                'correct_answer' => 'b',
            ],
            [
                'subject' => 'Chemistry',
                'question' => 'What is the pH scale used to measure?',
                'options' => json_encode([
                    ['a' => 'Temperature'],
                    ['b' => 'Acidity or alkalinity'],
                    ['c' => 'Pressure'],
                    ['d' => 'Density'],
                ]),
                'correct_answer' => 'b',
            ],
            [
                'subject' => 'Chemistry',
                'question' => 'What is the atomic number of carbon?',
                'options' => json_encode([
                    ['a' => '6'],
                    ['b' => '8'],
                    ['c' => '12'],
                    ['d' => '16'],
                ]),
                'correct_answer' => 'a',
            ],
            [
                'subject' => 'Chemistry',
                'question' => 'Which element has the symbol Fe on the periodic table?',
                'options' => json_encode([
                    ['a' => 'Iron'],
                    ['b' => 'Gold'],
                    ['c' => 'Silver'],
                    ['d' => 'Copper'],
                ]),
                'correct_answer' => 'a',
            ],
            [
                'subject' => 'Chemistry',
                'question' => 'What is the process of converting a gas directly into a solid called?',
                'options' => json_encode([
                    ['a' => 'Melting'],
                    ['b' => 'Freezing'],
                    ['c' => 'Condensation'],
                    ['d' => 'Deposition'],
                ]),
                'correct_answer' => 'd',
            ],
            [
                'subject' => 'Chemistry',
                'question' => 'What is the chemical symbol for silver?',
                'options' => json_encode([
                    ['a' => 'Ag'],
                    ['b' => 'Au'],
                    ['c' => 'Fe'],
                    ['d' => 'Cu'],
                ]),
                'correct_answer' => 'a',
            ],
            [
                'subject' => 'Chemistry',
                'question' => 'What is the formula for calculating density?',
                'options' => json_encode([
                    ['a' => 'D = m/v'],
                    ['b' => 'D = P/t'],
                    ['c' => 'D = Fd'],
                    ['d' => 'D = W/d'],
                ]),
                'correct_answer' => 'a',
            ],
        ];

        // Combine physics and chemistry questions
        $questions = array_merge($physicsQuestions, $chemistryQuestions);

        // Bulk insert all questions
        DB::table('questions')->insert($questions);
    }
}
