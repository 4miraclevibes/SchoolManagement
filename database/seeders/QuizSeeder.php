<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\QuizAnswer;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        $quizzes = [
            [
                'name' => 'Sejarah Indonesia',
                'description' => 'Quiz tentang sejarah Indonesia',
                'explanation' => 'Quiz ini menguji pengetahuan Anda tentang peristiwa penting dalam sejarah Indonesia.',
                'passing_score' => 6,
                'answers' => [
                    ['answer' => 'Indonesia merdeka pada tahun 1945', 'is_correct' => true],
                    ['answer' => 'Indonesia merdeka pada tahun 1949', 'is_correct' => false],
                    ['answer' => 'Indonesia merdeka pada tahun 1942', 'is_correct' => false],
                    ['answer' => 'Indonesia merdeka pada tahun 1950', 'is_correct' => false],
                ]
            ],
            [
                'name' => 'Geografi Indonesia',
                'description' => 'Quiz tentang geografi Indonesia',
                'explanation' => 'Quiz ini menguji pengetahuan Anda tentang geografi Indonesia.',
                'passing_score' => 7,
                'answers' => [
                    ['answer' => 'Indonesia terdiri dari 34 provinsi', 'is_correct' => true],
                    ['answer' => 'Indonesia terdiri dari 30 provinsi', 'is_correct' => false],
                    ['answer' => 'Indonesia terdiri dari 32 provinsi', 'is_correct' => false],
                    ['answer' => 'Indonesia terdiri dari 36 provinsi', 'is_correct' => false],
                ]
            ],
            [
                'name' => 'Budaya Indonesia',
                'description' => 'Quiz tentang keragaman budaya Indonesia',
                'explanation' => 'Quiz ini menguji pengetahuan Anda tentang berbagai aspek budaya Indonesia.',
                'passing_score' => 6,
                'answers' => [
                    ['answer' => 'Tari Saman berasal dari Aceh', 'is_correct' => true],
                    ['answer' => 'Tari Saman berasal dari Jawa Barat', 'is_correct' => false],
                    ['answer' => 'Tari Saman berasal dari Bali', 'is_correct' => false],
                    ['answer' => 'Tari Saman berasal dari Sulawesi Selatan', 'is_correct' => false],
                ]
            ],
            [
                'name' => 'Bahasa Indonesia',
                'description' => 'Quiz tentang tata bahasa Indonesia',
                'explanation' => 'Quiz ini menguji pemahaman Anda tentang tata bahasa Indonesia yang baik dan benar.',
                'passing_score' => 7,
                'answers' => [
                    ['answer' => '"Di mana" adalah penulisan yang benar', 'is_correct' => true],
                    ['answer' => '"Dimana" adalah penulisan yang benar', 'is_correct' => false],
                    ['answer' => '"Di-mana" adalah penulisan yang benar', 'is_correct' => false],
                    ['answer' => 'Semua penulisan di atas benar', 'is_correct' => false],
                ]
            ],
            [
                'name' => 'Sistem Pemerintahan Indonesia',
                'description' => 'Quiz tentang sistem pemerintahan di Indonesia',
                'explanation' => 'Quiz ini menguji pengetahuan Anda tentang struktur dan fungsi pemerintahan Indonesia.',
                'passing_score' => 6,
                'answers' => [
                    ['answer' => 'MPR adalah singkatan dari Majelis Permusyawaratan Rakyat', 'is_correct' => true],
                    ['answer' => 'MPR adalah singkatan dari Majelis Perwakilan Rakyat', 'is_correct' => false],
                    ['answer' => 'MPR adalah singkatan dari Majelis Pembangunan Rakyat', 'is_correct' => false],
                    ['answer' => 'MPR adalah singkatan dari Majelis Pengawas Rakyat', 'is_correct' => false],
                ]
            ],
            [
                'name' => 'Ekonomi Indonesia',
                'description' => 'Quiz tentang ekonomi Indonesia',
                'explanation' => 'Quiz ini menguji pemahaman Anda tentang sistem dan kebijakan ekonomi Indonesia.',
                'passing_score' => 6,
                'answers' => [
                    ['answer' => 'Bank Indonesia adalah bank sentral Indonesia', 'is_correct' => true],
                    ['answer' => 'Bank Mandiri adalah bank sentral Indonesia', 'is_correct' => false],
                    ['answer' => 'BNI adalah bank sentral Indonesia', 'is_correct' => false],
                    ['answer' => 'BRI adalah bank sentral Indonesia', 'is_correct' => false],
                ]
            ],
            [
                'name' => 'Teknologi di Indonesia',
                'description' => 'Quiz tentang perkembangan teknologi di Indonesia',
                'explanation' => 'Quiz ini menguji pengetahuan Anda tentang inovasi dan perkembangan teknologi di Indonesia.',
                'passing_score' => 6,
                'answers' => [
                    ['answer' => 'Gojek adalah aplikasi ride-hailing asli Indonesia', 'is_correct' => true],
                    ['answer' => 'Uber adalah aplikasi ride-hailing asli Indonesia', 'is_correct' => false],
                    ['answer' => 'Grab adalah aplikasi ride-hailing asli Indonesia', 'is_correct' => false],
                    ['answer' => 'Lyft adalah aplikasi ride-hailing asli Indonesia', 'is_correct' => false],
                ]
            ],
            [
                'name' => 'Olahraga Indonesia',
                'description' => 'Quiz tentang prestasi olahraga Indonesia',
                'explanation' => 'Quiz ini menguji pengetahuan Anda tentang prestasi dan atlet olahraga Indonesia.',
                'passing_score' => 6,
                'answers' => [
                    ['answer' => 'Bulu tangkis adalah olahraga yang paling banyak menyumbang medali emas Olimpiade untuk Indonesia', 'is_correct' => true],
                    ['answer' => 'Sepak bola adalah olahraga yang paling banyak menyumbang medali emas Olimpiade untuk Indonesia', 'is_correct' => false],
                    ['answer' => 'Renang adalah olahraga yang paling banyak menyumbang medali emas Olimpiade untuk Indonesia', 'is_correct' => false],
                    ['answer' => 'Atletik adalah olahraga yang paling banyak menyumbang medali emas Olimpiade untuk Indonesia', 'is_correct' => false],
                ]
            ],
            [
                'name' => 'Kuliner Indonesia',
                'description' => 'Quiz tentang makanan khas Indonesia',
                'explanation' => 'Quiz ini menguji pengetahuan Anda tentang berbagai makanan khas dari berbagai daerah di Indonesia.',
                'passing_score' => 7,
                'answers' => [
                    ['answer' => 'Rendang berasal dari Sumatera Barat', 'is_correct' => true],
                    ['answer' => 'Rendang berasal dari Jawa Tengah', 'is_correct' => false],
                    ['answer' => 'Rendang berasal dari Sulawesi Selatan', 'is_correct' => false],
                    ['answer' => 'Rendang berasal dari Kalimantan Timur', 'is_correct' => false],
                ]
            ],
            [
                'name' => 'Seni Indonesia',
                'description' => 'Quiz tentang seni dan kesenian Indonesia',
                'explanation' => 'Quiz ini menguji pengetahuan Anda tentang berbagai bentuk seni dan kesenian di Indonesia.',
                'passing_score' => 6,
                'answers' => [
                    ['answer' => 'Wayang kulit adalah seni pertunjukan tradisional dari Jawa', 'is_correct' => true],
                    ['answer' => 'Wayang kulit adalah seni pertunjukan tradisional dari Bali', 'is_correct' => false],
                    ['answer' => 'Wayang kulit adalah seni pertunjukan tradisional dari Sumatera', 'is_correct' => false],
                    ['answer' => 'Wayang kulit adalah seni pertunjukan tradisional dari Kalimantan', 'is_correct' => false],
                ]
            ],
            [
                'name' => 'Ilmu Pengetahuan Alam',
                'description' => 'Quiz tentang ilmu pengetahuan alam',
                'explanation' => 'Quiz ini menguji pengetahuan Anda tentang berbagai aspek ilmu pengetahuan alam.',
                'passing_score' => 7,
                'answers' => [
                    ['answer' => 'Tumbuhan yang memiliki daun berbentuk jantung disebut dengan tumbuhan berbunga', 'is_correct' => true],
                    ['answer' => 'Tumbuhan yang memiliki daun berbentuk jantung disebut dengan tumbuhan berbiji', 'is_correct' => false],
                    ['answer' => 'Tumbuhan yang memiliki daun berbentuk jantung disebut dengan tumbuhan berbuah', 'is_correct' => false],
                    ['answer' => 'Tumbuhan yang memiliki daun berbentuk jantung disebut dengan tumbuhan berakar', 'is_correct' => false],
                ]
            ],
            [
                'name' => 'Tokoh Nasional',
                'description' => 'Quiz tentang tokoh-tokoh nasional Indonesia',
                'explanation' => 'Quiz ini menguji pengetahuan Anda tentang tokoh-tokoh nasional Indonesia yang berpengaruh.',
                'passing_score' => 6,
                'answers' => [
                    ['answer' => 'Soekarno adalah presiden pertama Indonesia', 'is_correct' => true],
                    ['answer' => 'Soeharto adalah presiden pertama Indonesia', 'is_correct' => false],
                    ['answer' => 'B.J. Habibie adalah presiden pertama Indonesia', 'is_correct' => false],
                    ['answer' => 'Abdurrahman Wahid adalah presiden pertama Indonesia', 'is_correct' => false],
                ]
            ],
            [
                'name' => 'Peristiwa Internasional',
                'description' => 'Quiz tentang peristiwa internasional yang melibatkan Indonesia',
                'explanation' => 'Quiz ini menguji pengetahuan Anda tentang peristiwa internasional yang mempengaruhi Indonesia.',
                'passing_score' => 7,
                'answers' => [
                    ['answer' => 'Konflik Timor Leste adalah peristiwa yang melibatkan Indonesia', 'is_correct' => true],
                    ['answer' => 'Konflik Papua Barat adalah peristiwa yang melibatkan Indonesia', 'is_correct' => false],
                    ['answer' => 'Konflik Nakhoda adalah peristiwa yang melibatkan Indonesia', 'is_correct' => false],
                    ['answer' => 'Konflik Natuna adalah peristiwa yang melibatkan Indonesia', 'is_correct' => false],
                ]
            ],
            [
                'name' => 'Sejarah Dunia',
                'description' => 'Quiz tentang sejarah dunia',
                'explanation' => 'Quiz ini menguji pengetahuan Anda tentang peristiwa penting dalam sejarah dunia.',
                'passing_score' => 6,
                'answers' => [
                    ['answer' => 'Perang Dunia II berakhir pada tahun 1945', 'is_correct' => true],
                    ['answer' => 'Perang Dunia II berakhir pada tahun 1939', 'is_correct' => false],
                    ['answer' => 'Perang Dunia II berakhir pada tahun 1941', 'is_correct' => false],
                    ['answer' => 'Perang Dunia II berakhir pada tahun 1943', 'is_correct' => false],
                ]
            ],
            [
                'name' => 'Seni Dunia',
                'description' => 'Quiz tentang seni dan kesenian dunia',
                'explanation' => 'Quiz ini menguji pengetahuan Anda tentang berbagai bentuk seni dan kesenian dari berbagai belahan dunia.',
                'passing_score' => 7,
                'answers' => [
                    ['answer' => 'Monalisa adalah lukisan terkenal Leonardo da Vinci', 'is_correct' => true],
                    ['answer' => 'Mona Lisa adalah lukisan terkenal Vincent van Gogh', 'is_correct' => false],
                    ['answer' => 'Mona Lisa adalah lukisan terkenal Pablo Picasso', 'is_correct' => false],
                    ['answer' => 'Mona Lisa adalah lukisan terkenal Michelangelo', 'is_correct' => false],
                ]
            ],
            [
                'name' => 'Budaya Dunia',
                'description' => 'Quiz tentang keragaman budaya dunia',
                'explanation' => 'Quiz ini menguji pengetahuan Anda tentang berbagai aspek budaya dari berbagai belahan dunia.',
                'passing_score' => 6,
                'answers' => [
                    ['answer' => 'Tari Kecak berasal dari Bali, Indonesia', 'is_correct' => true],
                    ['answer' => 'Tari Kecak berasal dari Thailand', 'is_correct' => false],
                    ['answer' => 'Tari Kecak berasal dari Vietnam', 'is_correct' => false],
                    ['answer' => 'Tari Kecak berasal dari Filipina', 'is_correct' => false],
                ]
            ],
        ];

        foreach ($quizzes as $quizData) {
            $answers = $quizData['answers'];
            unset($quizData['answers']);
            
            $quiz = Quiz::create($quizData);
            
            foreach ($answers as $answerData) {
                $quiz->quizAnswers()->create($answerData);
            }
        }
    }
}
