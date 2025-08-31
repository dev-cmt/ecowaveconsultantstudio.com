<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Story;
use App\Models\Team;
use App\Models\Mission;
use App\Models\Client;
use App\Models\Service;

class DefaultSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'title' => 'Get In Touch',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'address' => '2512, New Market, Eliza Road, Sincher 80 CA, Canada, USA',
            'email' => 'support@example.com',
            'email2' => 'support@example.com',
            'phone' => '(41) 123 521 458',
            'phone2' => '(41) 123 521 458',
            'status' => true
        ]);

        Story::create([
            'title' => 'Ecowave ConsultantStudio',
            'content' => 'At Ecowave Consultant Studio, we transform ordinary spaces into extraordinary environments. With over 14 years of experience in creating inspired interiors, our expert team specializes in delivering innovative, sustainable, and aesthetically pleasing designs. Whether you are a homeowner, office owner, architect, or property developer, our tailored solutions bring your vision to life for users and the surrounding community.',
            'image' => 'frontEnd/images/bg-about-us.jpg',
            'status' => true
        ]);

        Team::create([
            'name' => 'Shaurya Preet',
            'position' => 'Co-Founder',
            'bio' => 'Experienced professional with years of industry knowledge.',
            'image' => 'frontEnd/img/team-1.jpg',
            'facebook' => 'https://facebook.com',
            'twitter' => 'https://twitter.com',
            'instagram' => 'https://instagram.com',
            'linkedin' => 'https://linkedin.com',
            'order' => 1,
            'status' => true
        ]);


        Mission::create([
            'image_path' => 'frontEnd/img/city.png',
            'mission_items' => json_encode([
                [
                    'icon_class' => 'fa-solid fa-unlock-keyhole',
                    'title' => 'Fully Secure & 24x7 Dedicated Support',
                    'description' => 'If you are an individual client, or just a business startup looking for good backlinks for your website.',
                    'order' => 1,
                    'status' => true
                ],
                // [
                //     'icon_class' => 'fa-brands fa-twitter',
                //     'title' => 'Manage your Social & Business Account Carefully',
                //     'description' => 'If you are an individual client, or just a business startup looking for good backlinks for your website.',
                //     'order' => 2,
                //     'status' => true
                // ],
                // [
                //     'icon_class' => 'fa-solid fa-layer-group',
                //     'title' => 'We are Very Hard Worker and loving',
                //     'description' => 'If you are an individual client, or just a business startup looking for good backlinks for your website.',
                //     'order' => 3,
                //     'status' => true
                // ]
            ]),
            'status' => true
        ]);

        $services = [
            [
                'title' => 'Architectural Design',
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they.',
                'image' => 'images/services/service-1.jpg',
                'icon' => 'flaticon-architecture',
                'sort_order' => 1,
                'status' => 'active',
            ],
            [
                'title' => 'Interior Design',
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they.',
                'image' => 'images/services/service-2.jpg',
                'icon' => 'flaticon-interior-design',
                'sort_order' => 2,
                'status' => 'active',
            ],
            [
                'title' => 'Corporate Design',
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they.',
                'image' => 'images/services/service-3.jpg',
                'icon' => 'flaticon-corporate',
                'sort_order' => 3,
                'status' => 'active',
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        Client::insert([
            [
                'name' => 'Client 1',
                'logo' => 'frontEnd/images/clients/client (1).jpg',
                'url' => '#',
                'sort_order' => 1,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Client 2',
                'logo' => 'frontEnd/images/clients/client (2).jpg',
                'url' => '#',
                'sort_order' => 2,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Client 3',
                'logo' => 'frontEnd/images/clients/client (3).jpg',
                'url' => '#',
                'sort_order' => 3,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Client 4',
                'logo' => 'frontEnd/images/clients/client (4).jpg',
                'url' => '#',
                'sort_order' => 4,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Client 5',
                'logo' => 'frontEnd/images/clients/client (5).jpg',
                'url' => '#',
                'sort_order' => 5,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Client 6',
                'logo' => 'frontEnd/images/clients/client (6).jpg',
                'url' => '#',
                'sort_order' => 6,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Client 7',
                'logo' => 'frontEnd/images/clients/client (7).jpg',
                'url' => '#',
                'sort_order' => 7,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Client 8',
                'logo' => 'frontEnd/images/clients/client (8).jpg',
                'url' => '#',
                'sort_order' => 8,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Client 9',
                'logo' => 'frontEnd/images/clients/client (9).jpg',
                'url' => '#',
                'sort_order' => 9,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Client 10',
                'logo' => 'frontEnd/images/clients/client (10).jpg',
                'url' => '#',
                'sort_order' => 10,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Client 11',
                'logo' => 'frontEnd/images/clients/client (11).jpg',
                'url' => '#',
                'sort_order' => 11,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Client 12',
                'logo' => 'frontEnd/images/clients/client (12).jpg',
                'url' => '#',
                'sort_order' => 12,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Client 13',
                'logo' => 'frontEnd/images/clients/client (13).jpg',
                'url' => '#',
                'sort_order' => 13,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Client 14',
                'logo' => 'frontEnd/images/clients/client (14).jpg',
                'url' => '#',
                'sort_order' => 14,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);






    }
}
