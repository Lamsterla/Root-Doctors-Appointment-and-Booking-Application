<?php
session_start();
$page_title = "HealthCare+ | Doctor & Hospital Appointments";
?>
<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0a7d8f",
                        "background-light": "#f8f7f7",
                        "background-dark": "#17191c",
                    },
                    fontFamily: {
                        "display": ["Manrope"]
                    },
                    borderRadius: {"DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px"},
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body {
            font-family: 'Manrope', sans-serif;
        }
        .soft-shadow {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        }
        .testimonial-carousel {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .testimonial-carousel::-webkit-scrollbar {
            display: none;
        }
        .hero-gradient {
            background: linear-gradient(135deg, rgba(10, 125, 143, 0.1) 0%, rgba(10, 125, 143, 0.05) 100%);
        }
    </style>
</head>
<body class="bg-[#edf7f2] dark:bg-background-dark text-[#363F47] dark:text-gray-200">
<div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">

<!-- Header Section -->
<header class="sticky top-0 z-50 w-full bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md border-b border-[#e7f2f3] dark:border-gray-800">
    <div class="max-w-[1200px] mx-auto px-6 h-20 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <div class="size-10 bg-primary rounded-lg flex items-center justify-center text-white">
                <span class="material-symbols-outlined">medical_services</span>
            </div>
            <h2 class="text-primary text-xl font-extrabold tracking-tight">ROOT</h2>
        </div>
        <nav class="hidden md:flex items-center gap-8">
            <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Find Doctors</a>
            <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Hospitals</a>
            <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Services</a>
            <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Trust Indicators</a>
        </nav>
        <div class="flex items-center gap-4">
            <a href="login.php" class="hidden sm:block text-sm font-bold text-primary px-4 py-2 hover:underline">
                Log In
            </a>
            <a href="signin.php" class="bg-primary text-white rounded-xl px-6 py-2.5 text-sm font-bold soft-shadow hover:brightness-110 transition-all">
                Sign In
            </a>
        </div>
    </div>
</header>

<main class="flex-1">
    <!-- Hero Section -->
    <section class="max-w-[1200px] mx-auto px-6 py-12 md:py-20">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <div class="space-y-4">
                    <span class="inline-block bg-primary/10 text-primary px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider">
                        Comprehensive Medical Care
                    </span>
                    <h1 class="text-5xl md:text-6xl font-extrabold text-[#1a2b2d] dark:text-white leading-[1.1] tracking-tight">
                        Quality Care for <span class="text-primary italic">Better Living.</span>
                    </h1>
                    <p class="text-lg text-gray-500 dark:text-gray-400 max-w-md leading-relaxed">
                        Book appointments with top-rated doctors and find the best medical facilities near you. Trusted healthcare solutions at your fingertips.
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-2 rounded-2xl soft-shadow border border-[#e7f2f3] dark:border-gray-700 flex flex-col md:flex-row gap-2">
                    <div class="flex-1 flex items-center px-4 gap-3 border-r border-gray-100 dark:border-gray-700">
                        <span class="material-symbols-outlined text-primary">search</span>
                        <input class="w-full border-none focus:ring-0 bg-transparent text-sm py-4" placeholder="Specialty, Doctor or Hospital" type="text"/>
                    </div>
                    <div class="flex-1 flex items-center px-4 gap-3">
                        <span class="material-symbols-outlined text-primary">location_on</span>
                        <input class="w-full border-none focus:ring-0 bg-transparent text-sm py-4" placeholder="Location" type="text"/>
                    </div>
                    <button class="bg-primary text-white px-8 py-4 rounded-xl font-bold hover:brightness-110 transition-all">
                        Book Now
                    </button>
                </div>
            </div>
            <div class="relative hidden lg:block">
                <div class="absolute -top-4 -left-4 w-72 h-72 bg-primary/5 rounded-full blur-3xl"></div>
                <div class="relative rounded-[2.5rem] overflow-hidden aspect-[4/5] soft-shadow border-[12px] border-white dark:border-gray-800">
                    <!-- Fixed hero image -->
                    <div class="w-full h-full bg-cover bg-center" style='background-image: url("https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80");'></div>
                </div>
                <div class="absolute bottom-10 -left-10 bg-white dark:bg-gray-800 p-4 rounded-2xl soft-shadow border border-[#e7f2f3] dark:border-gray-700 flex items-center gap-4 max-w-xs">
                    <div class="size-12 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined">check_circle</span>
                    </div>
                    <div>
                        <p class="text-sm font-bold">Accredited Centers</p>
                        <p class="text-xs text-gray-500">ISO Certified Facilities</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="bg-white dark:bg-gray-900 py-24">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center space-y-4 mb-16">
                <h2 class="text-4xl font-extrabold text-[#1a2b2d] dark:text-white">Our Services &amp; Treatments</h2>
                <p class="text-gray-500 dark:text-gray-400 max-w-2xl mx-auto">Providing a wide range of specialized medical treatments and diagnostic services with cutting-edge technology and compassionate care.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                $services = [
                    [
                        'icon' => 'monitor_heart',
                        'title' => 'Cardiac Care',
                        'description' => 'Advanced diagnostics including ECG, Echo, and Stress Tests, alongside complex interventional cardiology procedures.'
                    ],
                    [
                        'icon' => 'radiology',
                        'title' => 'Diagnostic Imaging',
                        'description' => 'High-precision MRI, CT scans, and X-rays interpreted by senior radiologists for accurate and timely diagnosis.'
                    ],
                    [
                        'icon' => 'child_care',
                        'title' => 'Pediatric Care',
                        'description' => 'Comprehensive healthcare services for infants, children, and adolescents, including vaccinations and wellness checkups.'
                    ],
                    [
                        'icon' => 'medical_services',
                        'title' => 'Surgical Services',
                        'description' => 'Minimally invasive laparoscopic surgeries and major surgical procedures across multiple medical disciplines.'
                    ],
                    [
                        'icon' => 'dentistry',
                        'title' => 'Dental Services',
                        'description' => 'Complete oral healthcare ranging from routine cleanings and fillings to complex orthodontic and restorative procedures.'
                    ],
                    [
                        'icon' => 'psychology',
                        'title' => 'Mental Health',
                        'description' => 'Compassionate counseling, psychiatric evaluations, and therapy sessions for emotional and psychological well-being.'
                    ]
                ];
                
                foreach ($services as $service) {
                ?>
                <div class="p-8 rounded-2xl bg-background-light dark:bg-gray-800 border border-transparent hover:border-primary/20 transition-all group hover:shadow-lg">
                    <div class="size-14 bg-primary rounded-xl flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-3xl"><?php echo htmlspecialchars($service['icon']); ?></span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 dark:text-white group-hover:text-primary transition-colors"><?php echo htmlspecialchars($service['title']); ?></h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed mb-6"><?php echo htmlspecialchars($service['description']); ?></p>
                    <a class="text-primary text-sm font-bold flex items-center gap-2 hover:gap-3 transition-all" href="#">
                        Learn More <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Doctors & Hospitals Section -->
    <section class="max-w-[1200px] mx-auto px-6 py-24">
        <div class="space-y-2 mb-12 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h2 class="text-3xl font-bold dark:text-white">Top Rated Doctors &amp; Hospitals</h2>
                <p class="text-gray-500 dark:text-gray-400">Our highest-rated healthcare providers and medical facilities</p>
            </div>
            <div class="flex gap-2">
                <button class="px-5 py-2 rounded-full border border-primary/20 text-sm font-bold bg-primary text-white hover:bg-primary/90 transition-colors">All</button>
                <button class="px-5 py-2 rounded-full border border-gray-200 dark:border-gray-700 text-sm font-bold hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">Doctors</button>
                <button class="px-5 py-2 rounded-full border border-gray-200 dark:border-gray-700 text-sm font-bold hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">Hospitals</button>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            $providers = [
                [
                    'image' => 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                    'name' => 'Dr. Sarah Jenkins',
                    'specialty' => 'Senior Cardiologist',
                    'rating' => '4.9',
                    'experience' => '15+ Years Experience'
                ],
                [
                    'image' => 'https://images.unsplash.com/photo-1586773860418-dc22f8b874bc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                    'name' => 'City General Hospital',
                    'specialty' => 'Multi-specialty Center',
                    'rating' => '4.7',
                    'location' => 'Downtown, NY'
                ],
                [
                    'image' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1364&q=80',
                    'name' => 'Dr. Michael Chen',
                    'specialty' => 'Pediatric Specialist',
                    'rating' => '4.8',
                    'experience' => '10+ Years Experience'
                ],
                [
                    'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1453&q=80',
                    'name' => 'St. Jude Medical Care',
                    'specialty' => 'Advanced Diagnostics',
                    'rating' => '4.9',
                    'location' => 'Brooklyn, NY'
                ]
            ];
            
            foreach ($providers as $provider) {
                $isDoctor = isset($provider['experience']);
            ?>
            <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden soft-shadow border border-gray-100 dark:border-gray-700 hover:translate-y-[-4px] transition-transform duration-300">
                <div class="h-48 bg-cover bg-center" style='background-image: url("<?php echo htmlspecialchars($provider['image']); ?>")'></div>
                <div class="p-6 space-y-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-extrabold text-lg dark:text-white"><?php echo htmlspecialchars($provider['name']); ?></h4>
                            <p class="text-sm text-primary font-semibold"><?php echo htmlspecialchars($provider['specialty']); ?></p>
                        </div>
                        <div class="flex items-center gap-1 bg-yellow-50 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400 px-2 py-1 rounded text-xs font-bold">
                            <span class="material-symbols-outlined text-xs">star</span> <?php echo htmlspecialchars($provider['rating']); ?>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-500 font-medium">
                        <?php if ($isDoctor) { ?>
                        <span class="material-symbols-outlined text-sm text-green-500">verified</span>
                        <?php echo htmlspecialchars($provider['experience']); ?>
                        <?php } else { ?>
                        <span class="material-symbols-outlined text-sm text-primary">location_on</span>
                        <?php echo htmlspecialchars($provider['location']); ?>
                        <?php } ?>
                    </div>
                    <button class="w-full py-3 rounded-xl border-2 border-primary/20 text-primary font-bold hover:bg-primary hover:text-white transition-all">
                        <?php echo $isDoctor ? 'View Doctor' : 'Explore Hospital'; ?>
                    </button>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="bg-primary/5 py-24">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-12">
                    <div class="space-y-4">
                        <h2 class="text-4xl font-extrabold dark:text-white">Why Patients Trust Us</h2>
                        <p class="text-gray-500 dark:text-gray-400">Our commitment to excellence and patient-centric care has made us a leader in healthcare for over a decade.</p>
                    </div>
                    <div class="grid gap-6">
                        <?php
                        $stats = [
                            ['icon' => 'groups', 'value' => '50k+', 'label' => 'Happy Patients'],
                            ['icon' => 'workspace_premium', 'value' => '10+ Years', 'label' => 'Of Excellence'],
                            ['icon' => 'stethoscope', 'value' => '500+', 'label' => 'Specialist Doctors']
                        ];
                        
                        foreach ($stats as $stat) {
                        ?>
                        <div class="flex items-center gap-6 p-6 bg-white dark:bg-gray-800 rounded-2xl soft-shadow border border-white dark:border-gray-700 hover:shadow-lg transition-shadow">
                            <div class="size-16 rounded-2xl bg-primary/10 flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined text-4xl"><?php echo htmlspecialchars($stat['icon']); ?></span>
                            </div>
                            <div>
                                <h3 class="text-3xl font-extrabold text-[#1a2b2d] dark:text-white"><?php echo htmlspecialchars($stat['value']); ?></h3>
                                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider"><?php echo htmlspecialchars($stat['label']); ?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="relative bg-white dark:bg-gray-800 rounded-[2.5rem] p-8 md:p-12 soft-shadow border border-[#e7f2f3] dark:border-gray-700 overflow-hidden">
                    <div class="absolute top-8 right-12 opacity-10">
                        <span class="material-symbols-outlined text-7xl text-primary">format_quote</span>
                    </div>
                    <div class="testimonial-carousel flex overflow-x-auto snap-x snap-mandatory gap-8 scroll-smooth pb-4">
                        <?php
                        $testimonials = [
                            [
                                'image' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80',
                                'name' => 'Eleanor Shellstrop',
                                'role' => 'Cardiology Patient',
                                'text' => '"The care I received at HealthCare+ was exceptional. The specialists were knowledgeable and truly cared about my recovery process. Highly recommended!"'
                            ],
                            [
                                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80',
                                'name' => 'Chidi Anagonye',
                                'role' => 'Surgery Department',
                                'text' => '"Booking my consultation was effortless. The hospital staff made me feel at ease from the moment I walked in. Five-star service throughout."'
                            ]
                        ];
                        
                        foreach ($testimonials as $testimonial) {
                        ?>
                        <div class="min-w-full snap-center space-y-6">
                            <div class="flex items-center gap-4">
                                <div class="size-16 rounded-full overflow-hidden border-2 border-primary/20">
                                    <img alt="Patient" class="w-full h-full object-cover" src="<?php echo htmlspecialchars($testimonial['image']); ?>"/>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg dark:text-white"><?php echo htmlspecialchars($testimonial['name']); ?></h4>
                                    <p class="text-xs text-primary font-bold"><?php echo htmlspecialchars($testimonial['role']); ?></p>
                                </div>
                            </div>
                            <p class="text-lg italic text-gray-600 dark:text-gray-300 leading-relaxed">
                                <?php echo htmlspecialchars($testimonial['text']); ?>
                            </p>
                            <div class="flex text-yellow-400">
                                <?php for ($i = 0; $i < 5; $i++) { ?>
                                <span class="material-symbols-outlined text-base">star</span>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="flex justify-center gap-2 mt-8">
                        <div class="w-8 h-1 bg-primary rounded-full"></div>
                        <div class="w-2 h-1 bg-gray-200 dark:bg-gray-700 rounded-full"></div>
                        <div class="w-2 h-1 bg-gray-200 dark:bg-gray-700 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Footer Section -->
<footer class="bg-[#1a2b2d] text-white py-16">
    <div class="max-w-[1200px] mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-12">
            <div class="col-span-2 space-y-6">
                <div class="flex items-center gap-2">
                    <div class="size-8 bg-primary rounded flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-lg">medical_services</span>
                    </div>
                    <h2 class="text-xl font-bold">HealthCare+</h2>
                </div>
                <p class="text-gray-400 text-sm max-w-xs leading-relaxed">
                    Connecting patients with the world's best doctors and medical facilities. Seamless booking, trusted care.
                </p>
                <div class="flex gap-4">
                    <a class="size-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary transition-colors" href="#">
                        <span class="material-symbols-outlined">social_leaderboard</span>
                    </a>
                    <a class="size-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary transition-colors" href="#">
                        <span class="material-symbols-outlined text-sm">alternate_email</span>
                    </a>
                </div>
            </div>
            <?php
            $footer_links = [
                'Explore' => ['Find Doctors', 'Hospitals', 'Treatments', 'Diagnostics'],
                'Support' => ['Contact Us', 'FAQs', 'Emergency Care', 'Feedback'],
                'Legal' => ['Privacy Policy', 'Terms of Service', 'Cookie Policy']
            ];
            
            foreach ($footer_links as $title => $links) {
            ?>
            <div>
                <h4 class="font-bold mb-6"><?php echo htmlspecialchars($title); ?></h4>
                <ul class="space-y-4 text-sm text-gray-400">
                    <?php foreach ($links as $link) { ?>
                    <li><a class="hover:text-white transition-colors" href="#"><?php echo htmlspecialchars($link); ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
        </div>
        <div class="border-t border-white/5 mt-16 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
            <p>© <?php echo date('Y'); ?> HealthCare+ Inc. All rights reserved.</p>
            <div class="flex gap-8">
                <span>New York, USA</span>
                <span>London, UK</span>
            </div>
        </div>
    </div>
</footer>

</div>

<script>
    // Simple carousel navigation
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.querySelector('.testimonial-carousel');
        const dots = document.querySelectorAll('.testimonial-carousel + div > div');
        
        if (carousel && dots.length > 0) {
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    carousel.scrollTo({
                        left: carousel.children[index].offsetLeft,
                        behavior: 'smooth'
                    });
                    
                    // Update active dot
                    dots.forEach(d => d.classList.remove('w-8', 'bg-primary'));
                    dots.forEach(d => d.classList.add('w-2', 'bg-gray-200', 'dark:bg-gray-700'));
                    dot.classList.remove('w-2', 'bg-gray-200', 'dark:bg-gray-700');
                    dot.classList.add('w-8', 'bg-primary');
                });
            });
            
            // Auto scroll every 5 seconds
            let currentIndex = 0;
            setInterval(() => {
                currentIndex = (currentIndex + 1) % dots.length;
                carousel.scrollTo({
                    left: carousel.children[currentIndex].offsetLeft,
                    behavior: 'smooth'
                });
                
                // Update active dot
                dots.forEach(d => d.classList.remove('w-8', 'bg-primary'));
                dots.forEach(d => d.classList.add('w-2', 'bg-gray-200', 'dark:bg-gray-700'));
                dots[currentIndex].classList.remove('w-2', 'bg-gray-200', 'dark:bg-gray-700');
                dots[currentIndex].classList.add('w-8', 'bg-primary');
            }, 5000);
        }
        
        // Search form submission
        const searchForm = document.querySelector('section:first-of-type button');
        if (searchForm) {
            searchForm.addEventListener('click', function() {
                const specialty = document.querySelector('input[placeholder*="Specialty"]').value;
                const location = document.querySelector('input[placeholder*="Location"]').value;
                
                if (specialty || location) {
                    alert(`Searching for: ${specialty || 'Any specialty'} in ${location || 'Any location'}`);
                } else {
                    alert('Please enter a specialty or location to search.');
                }
            });
        }
        
        // Service card hover effects
        const serviceCards = document.querySelectorAll('section:nth-of-type(2) > div > div > div');
        serviceCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Filter buttons for Doctors/Hospitals
        const filterButtons = document.querySelectorAll('section:nth-of-type(3) button:not(:first-child)');
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-primary', 'text-white');
                    btn.classList.add('bg-transparent', 'text-gray-700', 'dark:text-gray-300');
                });
                this.classList.add('bg-primary', 'text-white');
                this.classList.remove('bg-transparent', 'text-gray-700', 'dark:text-gray-300');
            });
        });
    });
</script>
</body>
</html>