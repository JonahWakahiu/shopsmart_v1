<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'image_url' => 'https://img.freepik.com/free-vector/modern-devices-isometric-icons-collection-with-sixteen-isolated-images-computers-periphereals-various-consumer-electronics-illustration_1284-29118.jpg?t=st=1739897281~exp=1739900881~hmac=fe0d1cd98d4d1b1174c06c713122a45f99c1747b8ee8b8994df3cfc75ba4231a&w=996',
                'children' => [
                    [
                        'name' => 'Mobile Phone',
                        'image_url' => 'https://img.freepik.com/free-photo/ramadan-mobiles-perspective-side_187299-37688.jpg?t=st=1739897413~exp=1739901013~hmac=2d4caddc728cfa3c5cff3659450f2ddc0ba0b6de7971bfb44250b91ceafd17b8&w=996',
                        'children' => [
                            [
                                'name' => 'Smartphones',
                                'image_url' => 'https://img.freepik.com/free-vector/flat-design-new-smartphone-different-colors-set_23-2148799051.jpg?t=st=1739897333~exp=1739900933~hmac=1abf33179a1ec5e4d49daca57bd064715f2400600d9c8ea1c1c5a8accee0ce11&w=996',
                            ],
                            [
                                'name' => 'Feature Phones',
                                'image_url' => 'https://img.freepik.com/free-vector/antigravity-mobile-phone-with-social-media-elements_52683-24451.jpg?t=st=1739897653~exp=1739901253~hmac=e9851682aaae33a0fde01800f9898e3a2261d09d00a80b55a2c06e1806a9c993&w=996',
                            ],
                        ]
                    ],
                    [
                        'name' => 'Computers & Accessories',
                        'image_url' => 'https://img.freepik.com/free-photo/workplace-business-modern-male-accessories-laptop-white_155003-1722.jpg?t=st=1739897451~exp=1739901051~hmac=7e91884c9843f964f848602d2b5909d3d9e2e55210055439d675cd281f099751&w=996',
                        'children' => [
                            [
                                'name' => 'Laptops',
                                'image_url' => 'https://img.freepik.com/free-vector/laptop-computer-with-white-screen-keyboard_107791-1185.jpg?t=st=1739897497~exp=1739901097~hmac=88ed4d0e695d684bd031bacc5d41be017d9760f69e56a1860811b5754fa36a54&w=996'
                            ],
                            [
                                'name' => 'Desktops',
                                'image_url' => 'https://img.freepik.com/free-photo/front-view-computer-screen-office-workspace-with-keyboard-clipboard_23-2148821937.jpg?t=st=1739897545~exp=1739901145~hmac=9d25265cd24119ead2e3ecb273cfd85bbc4c52878fc4a10197a789fe076ff356&w=996'
                            ],
                            [
                                'name' => 'Monitors',
                                'image_url' => 'https://img.freepik.com/free-vector/realistic-television-design_1053-473.jpg?t=st=1739897567~exp=1739901167~hmac=08d43587125582bdddfc8b2bc26bde25bc85c4749f97cc9b7de4f707c5f23e5d&w=996'
                            ],
                        ]
                    ],
                    [
                        'name' => 'TV & Home Entertainment',
                        'image_url' => 'https://img.freepik.com/free-vector/home-theater-realistic-interior-template_1284-14928.jpg?t=st=1739897713~exp=1739901313~hmac=f5ed39d7967147d268553f8f1397d5dfadad58f2ecd0042593d01754b52d5f73&w=996',
                        'children' => [
                            [
                                'name' => 'Smart TVs',
                                'image_url' => 'https://img.freepik.com/free-psd/stunning-mountain-lake-view-modern-smart-tv-breathtaking-scenery-home-theater-experience_632498-34300.jpg?t=st=1739897784~exp=1739901384~hmac=f687eb866eb647bc064500825ced8d952ed7c2e6cfedfbcdff67622522702694&w=996'
                            ],
                            [
                                'name' => 'Sound Systems',
                                'image_url' => 'https://img.freepik.com/free-vector/flat-black-speaker-background_23-2148154690.jpg?t=st=1739897814~exp=1739901414~hmac=f0731a7de902ad1f42d2c1364890e85f3d80e28a39849711204ab7694dd4ebee&w=996'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Cameras & Accessories',
                        'image_url' => 'https://img.freepik.com/free-photo/arrangement-different-traveling-elements_23-2148884923.jpg?t=st=1739897852~exp=1739901452~hmac=ddd9a4c8ea575e5e4ac74fd584c5b0ebf0f931fc83700158f3084212a6a85f95&w=996',
                        'children' => [
                            [
                                'name' => 'DSLRs',
                                'image_url' => 'https://img.freepik.com/free-vector/camera-accessory_1284-13130.jpg?t=st=1739897907~exp=1739901507~hmac=31450f1c0ab0c143cb779dd1338c2a657be6f1afadfea02d25107bddcef75125&w=996',
                            ],
                            [
                                'name' => 'Security Cameras',
                                'image_url' => 'https://img.freepik.com/free-psd/home-security-surveillance-cctv-camera-icon-isolated-3d-render-illustration_439185-11421.jpg?t=st=1739897792~exp=1739901392~hmac=235a7cd3d2a6d2f5f6110f388acfe4358ae90762c1e5f29e8609ed9647604221&w=996',
                            ],
                        ]
                    ],

                ]
            ],
            [
                'name' => 'Fashion',
                'image_url' => 'https://img.freepik.com/free-photo/medium-shot-woman-wearing-hat_23-2149726074.jpg?t=st=1739898002~exp=1739901602~hmac=4a18113087603ba6dae2015c5099adf3f81f65d449f361e612a13f79e60a2a33&w=740',
                'children' => [
                    [
                        'name' => 'Men\'s Fashion',
                        'image_url' => 'https://img.freepik.com/free-photo/portrait-sitting-stylish-african-american-man-wear-sunglasses-cap-outdoor-street-fashion-black-man_627829-3481.jpg?t=st=1739898068~exp=1739901668~hmac=f87f4f4bcd17515870fd3758f6b86e282bae961646a8574983a68bae8c8b84ca&w=740',
                        'children' => [
                            [
                                'name' => 'Clothing',
                                'image_url' => 'https://img.freepik.com/free-photo/classic-men-casual-outfits-with-accessories-table_1357-162.jpg?t=st=1739898039~exp=1739901639~hmac=2049621fdeb2b4c9454ec8250bb385fbf5d060459cac014b4894237708ff8179&w=996'
                            ],
                            [
                                'name' => 'Shoes',
                                'image_url' => 'https://img.freepik.com/free-photo/brown-shoes-isolated-white-background-studio_268835-1354.jpg?t=st=1739898113~exp=1739901713~hmac=88216ea32604196359eed63dc659f0e22c63ba15e98dc4fcccadac19effd660e&w=996'
                            ],
                            [
                                'name' => 'Watches',
                                'image_url' => 'https://img.freepik.com/free-vector/realistic-watches-set_1284-11684.jpg?t=st=1739898139~exp=1739901739~hmac=e32cc594d17b508b3176cf99c15e7a98ee73ec7719f05253a86b4c8bfdba7a89&w=996'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Women\'s Fashion',
                        'image_url' => 'https://img.freepik.com/free-photo/fashionable-woman-taking-walk-outdoors_23-2148448831.jpg?t=st=1739898188~exp=1739901788~hmac=6f02cf0d6bd25399051d824e0a9285a18be5766a99826b815144de64b755989d&w=740',
                        'children' => [
                            [
                                'name' => 'Dresses',
                                'image_url' => 'https://img.freepik.com/free-photo/two-pretty-elegant-women-evening-cocktail-dresses-walking-along-promenade_273443-958.jpg?t=st=1739898256~exp=1739901856~hmac=4771b33b0a91311dccfc0b0b8b051231a897ff2750435bced9d7945cb459a35f&w=740',
                            ],
                            [
                                'name' => 'Handbags',
                                'image_url' => 'https://img.freepik.com/free-photo/beautiful-elegance-luxury-fashion-green-handbag_1203-7655.jpg?t=st=1739898282~exp=1739901882~hmac=4ad3be2b263b882b44202a1ce8a663ba6621b003d1a2b5b210ed3256e8f37bb0&w=740',
                            ],
                            [
                                'name' => 'Jewerly',
                                'image_url' => 'https://img.freepik.com/free-photo/beautiful-luxury-necklace-jewelry-stand-neck_1339-7949.jpg?t=st=1739898323~exp=1739901923~hmac=b0def33dd98eec89bb5faecbf18161f4c0926d30ec8bf8e96c8511c7b31a846b&w=740'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Kid\'s Fashion',
                        'image_url' => 'https://img.freepik.com/free-photo/two-beautiful-girls-pastel_155003-12459.jpg?t=st=1739898356~exp=1739901956~hmac=98aa36fb84354f22440b0ba8225b33ff3877df2b228ec338f13dbeafd5368ab4&w=740',
                        'children' => [
                            [
                                'name' => 'Boy\'s Clothing',
                                'image_url' => 'https://img.freepik.com/free-photo/portrait-two-little-boys-wearing-casual-looks-posing-park-holding-hands-pockets-handsome-brothers-walking-playing-together-concept-fashionable-stylish-kids-look-clothes_132075-12489.jpg?t=st=1739898463~exp=1739902063~hmac=9db94c4dfa878f85bd5730cf528de86b92f3eaf9c3aba539bb6fa64046e7bc70&w=740'
                            ],
                            [
                                'name' => 'Girl\'s Clothing',
                                'image_url' => 'https://img.freepik.com/free-photo/cute-little-girl-shopping_624325-3878.jpg?t=st=1739898488~exp=1739902088~hmac=03f010c69cf0934d5571aecd1ab83a9d727c2100d55633ba1a6c614fc408166f&w=740'
                            ],
                        ]
                    ],

                ]
            ],
            [
                'name' => 'Home & Kitchen',
                'image_url' => 'https://img.freepik.com/free-photo/picture-big-bright-kitchen-with-white-brown-cupboards-with-yellow-pineapple-tea-kettle-white-pepper-mill-metal-hanging-with-fruits_132075-5946.jpg?t=st=1739898551~exp=1739902151~hmac=3c55ca3612cb39c6b3dad17d35ec2af6674124808daf8b6c4f99e987535de0a7&w=996',
                'children' => [
                    [
                        'name' => 'Kitchen Appliances',
                        'image_url' => 'https://img.freepik.com/free-vector/kitchen-accessories-set_1284-18407.jpg?t=st=1739898830~exp=1739902430~hmac=70ae47fb605c3ff0bc6e56756ac6549b9cfbe8de48e7e20e7ca59a1bd2f5e3cb&w=996',
                        'children' => [
                            [
                                'name' => 'Blenders',
                                'image_url' => 'https://img.freepik.com/free-vector/white-household-kitchen-appliances-transparent-set_1284-26015.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                            [
                                'name' => 'Microwaves',
                                'image_url' => 'https://img.freepik.com/free-psd/microwave-oven-isolated-transparent-background_84443-2101.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                        ]
                    ],
                    [
                        'name' => 'Home Decor',
                        'image_url' => 'https://img.freepik.com/free-photo/beautiful-interior-decorations_23-2149155794.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',

                        'children' => [
                            [
                                'name' => 'Lighting',
                                'image_url' => 'https://img.freepik.com/free-photo/ceiling-lamps_1203-791.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                            [
                                'name' => 'Wall Art',
                                'image_url' => 'https://img.freepik.com/free-vector/hand-drawn-flat-design-boho-wall-art-set_23-2149264089.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                        ]
                    ],
                    [
                        'name' => 'Furniture',
                        'image_url' => 'https://img.freepik.com/free-vector/home-furniture-set_74855-15461.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',

                        'children' => [
                            [
                                'name' => 'Beds',
                                'image_url' => 'https://img.freepik.com/free-psd/bed-isolated-transparent-background_191095-10040.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                            [
                                'name' => 'Sofas',
                                'image_url' => 'https://img.freepik.com/free-psd/modern-gray-sofa-with-pillows-home-decor-furniture_84443-34284.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                        ]
                    ],
                ]
            ],
            [
                'name' => 'Health & Beauty',
                'image_url' => 'https://img.freepik.com/free-photo/floral-beauty-concept_23-2147817694.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                'children' => [
                    [
                        'name' => 'Personal Care',
                        'image_url' => 'https://img.freepik.com/free-photo/black-girl-with-towel-head-has-eye-patches-isolated-white-background_1157-52269.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                        'children' => [
                            [
                                'name' => 'Skincare',
                                'image_url' => 'https://img.freepik.com/free-photo/african-girl-woman-couch-lady-beautician_1157-48232.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                            [
                                'name' => 'Hair Care',
                                'image_url' => 'https://img.freepik.com/free-photo/stylist-woman-taking-care-her-client-afro-hair_23-2149259393.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                        ]
                    ],
                    [
                        'name' => 'Makeup',
                        'image_url' => 'https://img.freepik.com/free-photo/makeup-cosmetics-brushes-white-background-with-copy-space-text_1357-113.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',

                        'children' => [
                            [
                                'name' => 'Lipstick',
                                'image_url' => 'https://img.freepik.com/free-psd/crimson-lipstick-powder-beauty-shot_191095-83829.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                            [
                                'name' => 'Foundation',
                                'image_url' => 'https://img.freepik.com/free-photo/makeup-foundation-celebrating-all-skin-tones_23-2149179692.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                        ]
                    ],
                    [
                        'name' => 'Health Supplements',
                        'image_url' => 'https://img.freepik.com/free-photo/cannabis-form-pills-created-with-help-generative-ai-technology_185193-162582.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',

                    ],
                ]
            ],
            [
                'name' => 'Sports & Outdoors',
                'image_url' => 'https://img.freepik.com/free-photo/fitness-objects-forming-circular-space_23-2147692048.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                'children' => [
                    [
                        'name' => 'Gym Equipment',
                        'image_url' => 'https://img.freepik.com/free-vector/gym-equipment-illustrations-set-treadmill-running-machine-punching-bag-boxing-work-out-collection_575670-836.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                        'children' => [
                            [
                                'name' => 'Dumbbells',
                                'image_url' => 'https://img.freepik.com/free-photo/weights-kettlebells-gym_23-2147675173.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                            [
                                'name' => 'Treadmills',
                                'image_url' => 'https://img.freepik.com/free-vector/exercise-bike-treadmill-sport-tools-set_529539-130.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                        ]
                    ],
                    [
                        'name' => 'Outdoor Activities',
                        'image_url' => 'https://img.freepik.com/free-vector/athletic-people-practicing-exercise-characters_24877-51334.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                        'children' => [
                            [
                                'name' => 'Camping Gear',
                                'image_url' => 'https://img.freepik.com/free-psd/outdoor-camping-gear-equipment-collection_271628-8230.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                            [
                                'name' => 'Bicycles',
                                'image_url' => 'https://img.freepik.com/free-photo/bikes-rent-street_1187-2187.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                        ]
                    ],

                ]
            ],
            [
                'name' => 'Toys & Games',
                'image_url' => 'https://img.freepik.com/free-vector/kid-toys-set_98292-3571.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                'children' => [
                    [
                        'name' => 'Educational Toys',
                        'image_url' => 'https://img.freepik.com/free-psd/colorful-alphabet-blocks-stacked-pyramid-shape_191095-87146.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                    ],
                    [
                        'name' => 'Board Games',
                        'image_url' => 'https://img.freepik.com/free-vector/board-game-collection_52683-47849.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                    ],
                    [
                        'name' => 'Action Figures',
                        'image_url' => 'https://img.freepik.com/free-vector/various-color-future-cyborg-warriors-soldiers-futuristic-armor-alien-army-robot_1441-3008.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                    ],
                ]
            ],
            [
                'name' => 'Automotive',
                'image_url' => 'https://img.freepik.com/free-vector/black-white-car-repair-icons_1284-727.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                'children' => [
                    [
                        'name' => 'Car Accessories',
                        'image_url' => 'https://img.freepik.com/free-photo/various-work-tools-worktop_1170-1505.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                        'children' => [
                            [
                                'name' => 'Car Batteries',
                                'image_url' => 'https://img.freepik.com/free-vector/automotive-rechargeable-battery-4-car-parts-isometric-set-isolated-transparent-background-illustration_1284-61948.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                            [
                                'name' => 'Car Mats',
                                'image_url' => 'https://img.freepik.com/premium-photo/black-rubber-mat_770883-2941.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                            ],
                        ]
                    ],
                    [
                        'name' => 'Motorcycle Parts',
                        'image_url' => 'https://img.freepik.com/free-psd/stylish-blue-motorcycle-transparent-background_84443-27580.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                    ],
                ]
            ],
            [
                'name' => 'Books & Stationary',
                'image_url' => 'https://img.freepik.com/free-photo/top-view-wooden-desk-with-notebook-office-supplies_24837-170.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                'children' => [
                    [
                        'name' => 'Fiction',
                        'image_url' => 'https://img.freepik.com/free-photo/turn-page-collage_23-2149876327.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                    ],
                    [
                        'name' => 'Non Fiction',
                        'image_url' => 'https://img.freepik.com/free-photo/old-files_1194-2290.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                    ],
                    [
                        'name' => 'Educational',
                        'image_url' => 'https://img.freepik.com/free-photo/old-books-arranged-shelf_53876-147882.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                    ],
                ]
            ],
            [
                'name' => 'Groceries',
                'image_url' => 'https://img.freepik.com/free-psd/basket-full-groceries-vegetables-isolated-transparent-background_84443-1268.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                'children' => [
                    [
                        'name' => 'Fresh Produce',
                        'image_url' => 'https://img.freepik.com/free-photo/fresh-vegetables-salad_155003-853.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                    ],
                    [
                        'name' => 'Beverages',
                        'image_url' => 'https://img.freepik.com/free-psd/refreshing-mango-smoothie-glass-transparent-background_84443-27012.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                    ],
                    [
                        'name' => 'Snacks',
                        'image_url' => 'https://img.freepik.com/free-psd/delicious-crispy-tortilla-chips-with-fresh-pico-de-gallo-salsa-vibrant-mexican-snack-perfect-sharing_632498-27937.jpg?uid=R156951372&ga=GA1.1.1397144804.1738261590&semt=ais_hybrid',
                    ],
                ]
            ],
        ];

        DB::transaction(function () use ($categories) {
            $this->insertCategories($categories);
        });
    }

    private function insertCategories(array $categories, $parentId = null)
    {
        foreach ($categories as $category) {
            $newCategory = Category::updateOrCreate(
                ['name' => $category['name']],
                ['image_url' => $category['image_url'], 'parent_id' => $parentId, 'status' => 'active']
            );

            // Recursively insert children if they exist
            if (!empty($category['children'])) {
                $this->insertCategories($category['children'], $newCategory->id);
            }
        }
    }
}
