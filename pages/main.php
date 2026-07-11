<?php
session_start();

// Database configuration (for demo, we'll use session storage)
if (!isset($_SESSION['healthsync_app'])) {
    $_SESSION['healthsync_app'] = [
        'doctors' => [
            [
                'id' => 1,
                'name' => 'Dr. Sarah Mehta',
                'specialty' => 'Cardiologist',
                'subspecialty' => 'Heart Specialist',
                'rating' => 4.9,
                'distance' => 2.1,
                'price' => '₹800 - ₹2000',
                'available_today' => true,
                'verified' => true,
                'location' => 'Mumbai, Maharashtra',
                'lat' => 19.0760,
                'lng' => 72.8777,
                'address' => '123 Medical Center, Bandra West, Mumbai',
                'image' => 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=200&h=200&fit=crop',
                'available_slots' => ['09:00 AM', '11:00 AM', '02:00 PM', '04:00 PM'],
                'insurance' => ['Star Health', 'HDFC ERGO', 'ICICI Lombard', 'Max Bupa']
            ],
            [
                'id' => 2,
                'name' => 'Dr. Rajesh Patil',
                'specialty' => 'Neurologist',
                'subspecialty' => 'Brain & Spine',
                'rating' => 4.8,
                'distance' => 3.5,
                'price' => '₹1000 - ₹2500',
                'available_today' => false,
                'verified' => true,
                'next_available' => 'Tue, Oct 24',
                'location' => 'Navi Mumbai, Maharashtra',
                'lat' => 19.0330,
                'lng' => 73.0297,
                'address' => '456 Neurology Center, Vashi, Navi Mumbai',
                'image' => 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=200&h=200&fit=crop',
                'available_slots' => ['10:00 AM', '01:00 PM', '03:00 PM'],
                'insurance' => ['HDFC ERGO', 'ICICI Lombard', 'New India Assurance']
            ],
            [
                'id' => 3,
                'name' => 'Dr. Priya Sharma',
                'specialty' => 'Dermatologist',
                'subspecialty' => 'Skin Health',
                'rating' => 5.0,
                'distance' => 1.8,
                'price' => '₹600 - ₹1800',
                'available_today' => true,
                'verified' => true,
                'location' => 'Mumbai, Maharashtra',
                'lat' => 19.1077,
                'lng' => 72.8363,
                'address' => '789 Skin Care Clinic, Andheri West, Mumbai',
                'image' => 'https://images.unsplash.com/photo-1594824434340-7e7dfc37cabb?w=200&h=200&fit=crop',
                'available_slots' => ['08:00 AM', '12:00 PM', '03:30 PM', '05:00 PM'],
                'insurance' => ['Star Health', 'HDFC ERGO', 'Max Bupa']
            ],
            [
                'id' => 4,
                'name' => 'Dr. Amit Desai',
                'specialty' => 'Orthopedic Surgeon',
                'subspecialty' => 'Joint Replacement',
                'rating' => 4.7,
                'distance' => 4.2,
                'price' => '₹1500 - ₹3500',
                'available_today' => true,
                'verified' => true,
                'location' => 'Navi Mumbai, Maharashtra',
                'lat' => 19.0707,
                'lng' => 73.0078,
                'address' => '101 Bone & Joint Center, Kharghar, Navi Mumbai',
                'image' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?w=200&h=200&fit=crop',
                'available_slots' => ['09:30 AM', '11:30 AM', '02:30 PM'],
                'insurance' => ['HDFC ERGO', 'ICICI Lombard', 'Star Health', 'National Insurance']
            ],
            [
                'id' => 5,
                'name' => 'Dr. Anjali Kapoor',
                'specialty' => 'Gynecologist',
                'subspecialty' => 'Women\'s Health',
                'rating' => 4.9,
                'distance' => 2.5,
                'price' => '₹700 - ₹2200',
                'available_today' => true,
                'verified' => true,
                'location' => 'Mumbai, Maharashtra',
                'lat' => 19.0176,
                'lng' => 72.8561,
                'address' => '234 Women\'s Health Center, Colaba, Mumbai',
                'image' => 'https://images.unsplash.com/photo-1551601651-2a8555f1a136?w=200&h=200&fit=crop',
                'available_slots' => ['10:00 AM', '01:00 PM', '04:00 PM'],
                'insurance' => ['Max Bupa', 'Star Health', 'Religare Health']
            ],
            [
                'id' => 6,
                'name' => 'Dr. Vikram Singh',
                'specialty' => 'Pediatrician',
                'subspecialty' => 'Child Specialist',
                'rating' => 4.8,
                'distance' => 3.0,
                'price' => '₹500 - ₹1500',
                'available_today' => true,
                'verified' => true,
                'location' => 'Navi Mumbai, Maharashtra',
                'lat' => 19.0414,
                'lng' => 73.0226,
                'address' => '567 Child Care Center, Nerul, Navi Mumbai',
                'image' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?w=200&h=200&fit=crop',
                'available_slots' => ['09:00 AM', '11:00 AM', '03:00 PM'],
                'insurance' => ['ICICI Lombard', 'HDFC ERGO', 'Star Health']
            ],
            [
                'id' => 7,
                'name' => 'Dr. Arjun Reddy',
                'specialty' => 'Dentist',
                'subspecialty' => 'Oral Health',
                'rating' => 4.6,
                'distance' => 1.5,
                'price' => '₹400 - ₹1200',
                'available_today' => true,
                'verified' => true,
                'location' => 'Mumbai, Maharashtra',
                'lat' => 19.0635,
                'lng' => 72.8443,
                'address' => '890 Dental Care, Santacruz West, Mumbai',
                'image' => 'https://images.unsplash.com/photo-1622902046580-2b47f47f5471?w=200&h=200&fit=crop',
                'available_slots' => ['08:30 AM', '12:30 PM', '04:30 PM'],
                'insurance' => ['HDFC ERGO', 'Max Bupa', 'Star Health']
            ],
            [
                'id' => 8,
                'name' => 'Dr. Neha Verma',
                'specialty' => 'Psychiatrist',
                'subspecialty' => 'Mental Health',
                'rating' => 4.9,
                'distance' => 3.8,
                'price' => '₹1200 - ₹2800',
                'available_today' => false,
                'verified' => true,
                'next_available' => 'Wed, Oct 25',
                'location' => 'Navi Mumbai, Maharashtra',
                'lat' => 19.0576,
                'lng' => 73.0123,
                'address' => '321 Mind Care Clinic, CBD Belapur, Navi Mumbai',
                'image' => 'https://images.unsplash.com/photo-1594824434340-7e7dfc37cabb?w=200&h=200&fit=crop',
                'available_slots' => ['10:00 AM', '02:00 PM', '05:00 PM'],
                'insurance' => ['ICICI Lombard', 'Religare Health', 'Max Bupa']
            ]
        ],
        'chat_messages' => [
            [
                'sender' => 'bot',
                'message' => "Hello! I'm your HealthSync Assistant. How are you feeling today? I can help you check symptoms or find the right specialist.",
                'timestamp' => date('H:i')
            ]
        ],
        'notifications' => [],
        'appointments' => [],
        'filters' => [
            'insurance' => [],
            'availability' => 'all',
            'distance' => 10,
            'sort_by' => 'recommended'
        ],
        'user' => [
            'name' => 'Rohan Sharma',
            'email' => 'rohan.sharma@example.com',
            'insurance' => 'HDFC ERGO',
            'location' => 'Mumbai, Maharashtra'
        ]
    ];
}

$appData = &$_SESSION['healthsync_app'];

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['chat_message'])) {
        handleChatMessage();
    } elseif (isset($_POST['book_appointment'])) {
        handleAppointmentBooking();
    } elseif (isset($_POST['update_filters'])) {
        updateFilters();
    } elseif (isset($_POST['clear_notification'])) {
        clearNotification($_POST['notification_id']);
    } elseif (isset($_POST['cancel_appointment'])) {
        cancelAppointment($_POST['appointment_id']);
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

// Handle GET requests
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'view_profile') {
        $selectedDoctor = getDoctorById($_GET['doctor_id']);
    } elseif ($_GET['action'] === 'clear_search') {
        unset($_GET['search_query']);
        unset($_GET['location']);
    } elseif ($_GET['action'] === 'toggle_chat') {
        $appData['chat_visible'] = !($appData['chat_visible'] ?? false);
    }
}

// Handle search
$displayDoctors = $appData['doctors'];
if (isset($_GET['search_query']) && !empty(trim($_GET['search_query']))) {
    $displayDoctors = searchDoctors($_GET['search_query'], $_GET['location'] ?? '');
}

// Apply filters
$displayDoctors = applyFilters($displayDoctors);

// Helper functions
function handleChatMessage() {
    global $appData;
    $message = trim($_POST['chat_message']);
    
    if (!empty($message)) {
        $appData['chat_messages'][] = [
            'sender' => 'user',
            'message' => $message,
            'timestamp' => date('H:i')
        ];
        
        $response = generateBotResponse($message);
        $appData['chat_messages'][] = [
            'sender' => 'bot',
            'message' => $response,
            'timestamp' => date('H:i')
        ];
        
        // Limit chat history
        if (count($appData['chat_messages']) > 50) {
            $appData['chat_messages'] = array_slice($appData['chat_messages'], -50);
        }
        
        // Auto-open chat when user sends message
        $appData['chat_visible'] = true;
    }
}

function handleAppointmentBooking() {
    global $appData;
    $doctorId = (int)$_POST['doctor_id'];
    $dateTime = $_POST['appointment_datetime'];
    $reason = $_POST['reason'] ?? 'General Consultation';
    
    $doctor = getDoctorById($doctorId);
    if ($doctor) {
        $appointmentId = uniqid('appt_');
        $appData['appointments'][] = [
            'id' => $appointmentId,
            'doctor_id' => $doctorId,
            'doctor_name' => $doctor['name'],
            'specialty' => $doctor['specialty'],
            'date_time' => $dateTime,
            'reason' => $reason,
            'status' => 'confirmed',
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        // Add notification
        $notificationId = uniqid('notif_');
        $appData['notifications'][] = [
            'id' => $notificationId,
            'type' => 'success',
            'title' => 'Appointment Booked!',
            'message' => "✅ Your appointment with {$doctor['name']} is confirmed for " . date('M d, Y g:i A', strtotime($dateTime)),
            'timestamp' => time(),
            'read' => false
        ];
        
        // Add chat message
        $appData['chat_messages'][] = [
            'sender' => 'bot',
            'message' => "🎉 Appointment confirmed with {$doctor['name']} ({$doctor['specialty']}) on " . date('M d, Y g:i A', strtotime($dateTime)) . ". You'll receive a reminder 24 hours before your appointment.",
            'timestamp' => date('H:i')
        ];
        
        // Auto-open chat
        $appData['chat_visible'] = true;
    }
}

function cancelAppointment($appointmentId) {
    global $appData;
    
    $appointment = null;
    foreach ($appData['appointments'] as $key => $apt) {
        if ($apt['id'] === $appointmentId) {
            $appointment = $apt;
            unset($appData['appointments'][$key]);
            $appData['appointments'] = array_values($appData['appointments']);
            break;
        }
    }
    
    if ($appointment) {
        // Add notification
        $notificationId = uniqid('notif_');
        $appData['notifications'][] = [
            'id' => $notificationId,
            'type' => 'info',
            'title' => 'Appointment Cancelled',
            'message' => "❌ Your appointment with {$appointment['doctor_name']} has been cancelled.",
            'timestamp' => time(),
            'read' => false
        ];
        
        // Add chat message
        $appData['chat_messages'][] = [
            'sender' => 'bot',
            'message' => "Your appointment with {$appointment['doctor_name']} has been cancelled. You can book a new appointment anytime.",
            'timestamp' => date('H:i')
        ];
        
        $appData['chat_visible'] = true;
    }
}

function generateBotResponse($message) {
    global $appData;
    $message = strtolower($message);
    
    // Medical specialty mapping
    $specialtyKeywords = [
        'headache' => 'Neurologist',
        'migraine' => 'Neurologist',
        'pain' => 'Neurologist',
        'heart' => 'Cardiologist',
        'chest' => 'Cardiologist',
        'blood pressure' => 'Cardiologist',
        'skin' => 'Dermatologist',
        'rash' => 'Dermatologist',
        'acne' => 'Dermatologist',
        'cough' => 'General Practitioner',
        'fever' => 'General Practitioner',
        'cold' => 'General Practitioner',
        'stomach' => 'Gastroenterologist',
        'digest' => 'Gastroenterologist',
        'bone' => 'Orthopedic',
        'joint' => 'Orthopedic',
        'mental' => 'Psychiatrist',
        'anxiety' => 'Psychiatrist',
        'depression' => 'Psychiatrist',
        'women' => 'Gynecologist',
        'pregnancy' => 'Gynecologist',
        'child' => 'Pediatrician',
        'baby' => 'Pediatrician',
        'teeth' => 'Dentist',
        'dental' => 'Dentist'
    ];
    
    // Check for greeting
    if (strpos($message, 'hello') !== false || 
        strpos($message, 'hi') !== false ||
        strpos($message, 'hey') !== false ||
        strpos($message, 'namaste') !== false) {
        return "Hello! I'm your HealthSync Assistant. How can I help you today?";
    }
    
    // Check for appointments
    if (strpos($message, 'appointment') !== false || strpos($message, 'booking') !== false) {
        $count = count($appData['appointments'] ?? []);
        if ($count > 0) {
            $lastAppointment = end($appData['appointments']);
            return "You have $count upcoming appointment(s). Your last booking was with {$lastAppointment['doctor_name']} on " . 
                   date('M d', strtotime($lastAppointment['date_time'])) . ". Would you like to view all appointments?";
        } else {
            return "You don't have any upcoming appointments. Would you like to book one?";
        }
    }
    
    // Check for symptoms
    $matchedSpecialty = null;
    foreach ($specialtyKeywords as $keyword => $specialty) {
        if (strpos($message, $keyword) !== false) {
            $matchedSpecialty = $specialty;
            break;
        }
    }
    
    if ($matchedSpecialty) {
        $doctorsInSpecialty = array_filter($appData['doctors'], function($doctor) use ($matchedSpecialty) {
            return strpos($doctor['specialty'], $matchedSpecialty) !== false;
        });
        
        $count = count($doctorsInSpecialty);
        if ($count > 0) {
            $availableToday = array_filter($doctorsInSpecialty, function($doctor) {
                return $doctor['available_today'];
            });
            
            $todayCount = count($availableToday);
            return "Based on your symptoms, I recommend consulting a <strong>$matchedSpecialty</strong>. We have $count $matchedSpecialty(s) in Mumbai/Navi Mumbai ($todayCount available today). Try searching for '$matchedSpecialty' above!";
        } else {
            return "Based on your symptoms, I recommend consulting a <strong>$matchedSpecialty</strong>. We currently don't have $matchedSpecialty specialists in your area, but you can try expanding your search location.";
        }
    }
    
    // Default responses
    $responses = [
        "I understand. Can you tell me more about your symptoms so I can recommend the right specialist?",
        "I'm here to help you find the right healthcare provider. What seems to be the concern?",
        "For accurate medical advice, please consult with a healthcare professional. I can help you find one nearby.",
        "Would you like me to search for a specific type of doctor or check availability in Mumbai/Navi Mumbai?"
    ];
    
    return $responses[array_rand($responses)];
}

function searchDoctors($query, $location) {
    global $appData;
    $query = strtolower(trim($query));
    $location = strtolower(trim($location));
    
    return array_filter($appData['doctors'], function($doctor) use ($query, $location) {
        $match = false;
        
        // Search in multiple fields
        $searchFields = ['name', 'specialty', 'subspecialty', 'address'];
        foreach ($searchFields as $field) {
            if (isset($doctor[$field]) && strpos(strtolower($doctor[$field]), $query) !== false) {
                $match = true;
                break;
            }
        }
        
        // Filter by location
        if ($location && isset($doctor['location']) && 
            strpos(strtolower($doctor['location']), $location) === false) {
            $match = false;
        }
        
        return $match;
    });
}

function applyFilters($doctors) {
    global $appData;
    $filters = $appData['filters'];
    
    // Insurance filter
    if (!empty($filters['insurance'])) {
        $doctors = array_filter($doctors, function($doctor) use ($filters) {
            return !empty(array_intersect($filters['insurance'], $doctor['insurance'] ?? []));
        });
    }
    
    // Availability filter
    if ($filters['availability'] === 'today') {
        $doctors = array_filter($doctors, function($doctor) {
            return $doctor['available_today'];
        });
    }
    
    // Distance filter
    if ($filters['distance'] > 0) {
        $doctors = array_filter($doctors, function($doctor) use ($filters) {
            return $doctor['distance'] <= $filters['distance'];
        });
    }
    
    // Sorting
    switch ($filters['sort_by']) {
        case 'rating':
            usort($doctors, function($a, $b) {
                return $b['rating'] <=> $a['rating'];
            });
            break;
        case 'distance':
            usort($doctors, function($a, $b) {
                return $a['distance'] <=> $b['distance'];
            });
            break;
        case 'price_low':
            usort($doctors, function($a, $b) {
                $priceA = (float)preg_replace('/[^0-9]/', '', $a['price']);
                $priceB = (float)preg_replace('/[^0-9]/', '', $b['price']);
                return $priceA <=> $priceB;
            });
            break;
        default: // recommended
            usort($doctors, function($a, $b) {
                $scoreA = $a['rating'] * 0.6 + (1/$a['distance']) * 0.3 + ($a['available_today'] ? 0.1 : 0);
                $scoreB = $b['rating'] * 0.6 + (1/$b['distance']) * 0.3 + ($b['available_today'] ? 0.1 : 0);
                return $scoreB <=> $scoreA;
            });
    }
    
    return array_values($doctors);
}

function updateFilters() {
    global $appData;
    
    if (isset($_POST['insurance'])) {
        $appData['filters']['insurance'] = $_POST['insurance'];
    }
    
    if (isset($_POST['availability'])) {
        $appData['filters']['availability'] = $_POST['availability'];
    }
    
    if (isset($_POST['distance'])) {
        $appData['filters']['distance'] = (float)$_POST['distance'];
    }
    
    if (isset($_POST['sort_by'])) {
        $appData['filters']['sort_by'] = $_POST['sort_by'];
    }
}

function getDoctorById($id) {
    global $appData;
    foreach ($appData['doctors'] as $doctor) {
        if ($doctor['id'] == $id) {
            return $doctor;
        }
    }
    return null;
}

function clearNotification($id) {
    global $appData;
    $appData['notifications'] = array_filter($appData['notifications'], function($notification) use ($id) {
        return $notification['id'] !== $id;
    });
}

function getUnreadNotificationsCount() {
    global $appData;
    $count = 0;
    foreach ($appData['notifications'] as $notification) {
        if (!$notification['read']) {
            $count++;
        }
    }
    return $count;
}

// Get data for display
$totalDoctors = count($displayDoctors);
$unreadNotifications = getUnreadNotificationsCount();
$upcomingAppointments = count($appData['appointments'] ?? []);
$chatVisible = $appData['chat_visible'] ?? false;

// Indian insurance companies
$indianInsurances = ['Star Health', 'HDFC ERGO', 'ICICI Lombard', 'Max Bupa', 'New India Assurance', 'National Insurance', 'Religare Health', 'Bajaj Allianz'];
?>

<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Doctor Search & Booking | HealthSync India</title>
    
    <!-- LEAFLET CSS & JS (NO API KEY NEEDED) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#14b8b8",
                        "background-light": "#fafafa",
                        "background-dark": "#1a1d21",
                        "card-light": "#ffffff",
                        "card-dark": "#262b30",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    animation: {
                        'slide-in': 'slideIn 0.3s ease-out',
                        'slide-out': 'slideOut 0.3s ease-in',
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'bounce-slow': 'bounce 2s infinite',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        slideIn: {
                            '0%': { transform: 'translateY(-10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        },
                        slideOut: {
                            '0%': { transform: 'translateY(0)', opacity: '1' },
                            '100%': { transform: 'translateY(-10px)', opacity: '0' }
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        }
                    }
                },
            },
        }
    </script>
    
    <style>
        body { font-family: 'Manrope', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ef4444;
            color: white;
            border-radius: 9999px;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        .doctor-card:hover {
            transform: translateY(-2px);
            transition: transform 0.2s ease-in-out;
        }
        .modal-overlay {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }
        
        /* Leaflet Custom Styles */
        .leaflet-control-zoom a {
            background: white !important;
            color: #64748b !important;
            border: none !important;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1) !important;
        }
        
        .leaflet-popup-content {
            font-family: 'Manrope', sans-serif !important;
        }
        
        .custom-marker {
            background: #14b8b8;
            color: white;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            border: 2px solid white;
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
            min-width: 60px;
        }
        
        .custom-marker:hover {
            transform: scale(1.1);
            z-index: 1000 !important;
        }
        
        .custom-marker.available {
            background: #14b8b8;
        }
        
        .custom-marker.unavailable {
            background: #94a3b8;
        }
        
        .custom-marker.mumbai {
            background: #3b82f6;
        }
        
        .custom-marker.navi-mumbai {
            background: #10b981;
        }
        
        .leaflet-control-zoom {
            border: none !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important;
            border-radius: 8px !important;
            overflow: hidden;
        }
        
        .leaflet-control-zoom a {
            background: white !important;
            color: #64748b !important;
            border: none !important;
            width: 36px !important;
            height: 36px !important;
            line-height: 36px !important;
            font-size: 18px !important;
        }
        
        .leaflet-control-zoom a:hover {
            background: #f8fafc !important;
        }
        
        .user-location-marker {
            background: #ef4444;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            border: 2px solid white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        .map-legend {
            background: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            font-size: 12px;
        }
        
        /* Z-INDEX FIXES */
        #chatWindow {
            z-index: 99999 !important;
        }
        
        button.fixed.bottom-6.right-6 {
            z-index: 99999 !important;
        }
        
        #notificationsDropdown {
            z-index: 99999 !important;
        }
        
        #appointmentModal {
            z-index: 999999 !important;
        }
        
        /* Contain Leaflet map */
        .leaflet-container {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            width: 100% !important;
            height: 100% !important;
            z-index: 1 !important;
        }
        
        /* Map container */
        .hidden.lg\:block.flex-1.relative {
            position: relative !important;
            overflow: hidden !important;
            z-index: 1 !important;
        }
        
        /* Force UI elements above map */
        .bg-white, 
        .bg-card-dark,
        .bg-background-light,
        .bg-background-dark {
            position: relative;
            z-index: 2;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 antialiased font-display">
    <!-- Notifications Dropdown -->
    <div id="notificationsDropdown" class="hidden fixed top-16 right-4 w-80 bg-white dark:bg-card-dark rounded-xl shadow-2xl border border-slate-200 dark:border-slate-800" style="z-index: 99999;">
        <div class="p-4 border-b border-slate-100 dark:border-slate-800">
            <div class="flex items-center justify-between">
                <h3 class="font-bold text-slate-900 dark:text-white">Notifications</h3>
                <?php if (!empty($appData['notifications'])): ?>
                    <button onclick="clearAllNotifications()" class="text-xs text-primary hover:text-primary/80">
                        Clear All
                    </button>
                <?php endif; ?>
            </div>
        </div>
        <div class="max-h-96 overflow-y-auto">
            <?php if (empty($appData['notifications'])): ?>
                <div class="p-8 text-center text-slate-500 dark:text-slate-400">
                    <span class="material-symbols-outlined text-4xl mb-4">notifications_off</span>
                    <p>No notifications yet</p>
                </div>
            <?php else: ?>
                <?php foreach (array_reverse($appData['notifications']) as $notification): ?>
                    <div class="p-4 border-b border-slate-100 dark:border-slate-800 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors <?php echo $notification['read'] ? 'opacity-75' : 'bg-primary/5'; ?>">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-<?php echo $notification['type']; ?>-500/20 text-<?php echo $notification['type']; ?>-500 flex items-center justify-center">
                                <span class="material-symbols-outlined text-sm">
                                    <?php echo $notification['type'] === 'success' ? 'check_circle' : 'info'; ?>
                                </span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-sm text-slate-900 dark:text-white"><?php echo $notification['title']; ?></h4>
                                <p class="text-xs text-slate-600 dark:text-slate-300 mt-1"><?php echo $notification['message']; ?></p>
                                <p class="text-[10px] text-slate-400 mt-2"><?php echo date('M d, g:i A', $notification['timestamp']); ?></p>
                            </div>
                            <form method="POST" class="ml-2">
                                <input type="hidden" name="notification_id" value="<?php echo $notification['id']; ?>">
                                <input type="hidden" name="clear_notification" value="1">
                                <button type="submit" class="text-slate-400 hover:text-slate-600">
                                    <span class="material-symbols-outlined text-sm">close</span>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Appointment Modal -->
    <div id="appointmentModal" class="hidden fixed inset-0 z-[999999] modal-overlay">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white dark:bg-card-dark rounded-2xl shadow-2xl w-full max-w-md transform transition-all animate-slide-in">
                <form method="POST" action="" id="appointmentForm">
                    <div class="p-6 border-b border-slate-100 dark:border-slate-800">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white">Book Appointment</h3>
                            <button type="button" onclick="closeModal()" class="text-slate-400 hover:text-slate-600">
                                <span class="material-symbols-outlined">close</span>
                            </button>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div id="doctorInfo"></div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Select Date & Time
                            </label>
                            <input type="datetime-local" name="appointment_datetime" required
                                class="w-full px-4 py-2.5 bg-slate-100 dark:bg-slate-800 border-none rounded-lg focus:ring-2 focus:ring-primary/50 text-sm transition-all"
                                min="<?php echo date('Y-m-d\TH:i'); ?>">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Reason for Visit
                            </label>
                            <textarea name="reason" rows="3"
                                class="w-full px-4 py-2.5 bg-slate-100 dark:bg-slate-800 border-none rounded-lg focus:ring-2 focus:ring-primary/50 text-sm transition-all resize-none"
                                placeholder="Briefly describe your symptoms or reason for visit..."></textarea>
                        </div>
                        <input type="hidden" name="doctor_id" id="modalDoctorId">
                        <input type="hidden" name="book_appointment" value="1">
                    </div>
                    <div class="p-6 border-t border-slate-100 dark:border-slate-800 flex gap-3">
                        <button type="button" onclick="closeModal()"
                            class="flex-1 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 rounded-lg text-sm font-bold transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                            class="flex-1 py-2.5 bg-primary text-white hover:bg-primary/90 rounded-lg text-sm font-bold transition-colors">
                            Confirm Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Header / Navigation -->
    <header class="sticky top-0 z-40 w-full bg-white/80 dark:bg-background-dark/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800">
        <div class="max-w-[1440px] mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center text-white">
                    <span class="material-symbols-outlined text-xl">medical_services</span>
                </div>
                <h2 class="text-xl font-extrabold tracking-tight text-slate-900 dark:text-white">ROOT</h2>
            </div>
            <nav class="hidden md:flex items-center gap-8">
                <a class="text-sm font-semibold text-primary" href="#">Find Doctors</a>
                <a class="text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-primary transition-colors" href="#">
                    Appointments <?php if ($upcomingAppointments > 0): ?>
                        <span class="inline-flex items-center justify-center w-5 h-5 ml-1 text-xs font-bold text-white bg-primary rounded-full">
                            <?php echo $upcomingAppointments; ?>
                        </span>
                    <?php endif; ?>
                </a>
                <a class="text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-primary transition-colors" href="#">Medical Records</a>
            </nav>
            <div class="flex items-center gap-4">
                <div class="relative">
                    <button onclick="toggleNotifications()" class="p-2 text-slate-500 dark:text-slate-400 relative">
                        <span class="material-symbols-outlined">notifications</span>
                        <?php if ($unreadNotifications > 0): ?>
                            <div class="notification-badge"><?php echo $unreadNotifications; ?></div>
                        <?php endif; ?>
                    </button>
                </div>
                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-medium text-slate-900 dark:text-white"><?php echo $appData['user']['name']; ?></p>
                        <p class="text-xs text-slate-500 dark:text-slate-400"><?php echo $appData['user']['insurance']; ?></p>
                    </div>
                    <div class="w-10 h-10 rounded-full border-2 border-primary/20 p-0.5">
                        <div class="w-full h-full rounded-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=150&h=150&fit=crop')"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="flex flex-col h-[calc(100vh-64px)]">
        <!-- Search & Filters Bar -->
        <div class="w-full bg-white dark:bg-card-dark border-b border-slate-200 dark:border-slate-800 px-6 py-4 shadow-sm z-30">
            <form method="GET" action="" class="max-w-[1440px] mx-auto flex flex-col lg:flex-row gap-4">
                <div class="flex-1 flex gap-2">
                    <div class="flex-1 relative group">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">search</span>
                        <input name="search_query" value="<?php echo isset($_GET['search_query']) ? htmlspecialchars($_GET['search_query']) : ''; ?>"
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-100 dark:bg-slate-800 border-none rounded-xl focus:ring-2 focus:ring-primary/50 text-sm transition-all"
                            placeholder="Specialty, doctor name, or condition..." type="text"/>
                    </div>
                    <div class="flex-1 max-w-[240px] relative group">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors">location_on</span>
                        <input name="location" id="locationInput" value="<?php echo isset($_GET['location']) ? htmlspecialchars($_GET['location']) : $appData['user']['location']; ?>"
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-100 dark:bg-slate-800 border-none rounded-xl focus:ring-2 focus:ring-primary/50 text-sm transition-all"
                            placeholder="Location" type="text"/>
                    </div>
                    <button type="submit" class="bg-primary hover:bg-primary/90 text-white px-6 rounded-xl font-bold text-sm transition-all shadow-lg shadow-primary/20">
                        Search
                    </button>
                    <?php if (isset($_GET['search_query']) || isset($_GET['location']) && $_GET['location'] !== $appData['user']['location']): ?>
                        <a href="?action=clear_search" class="bg-slate-200 hover:bg-slate-300 dark:bg-slate-700 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-300 px-4 rounded-xl font-bold text-sm transition-all flex items-center">
                            Clear
                        </a>
                    <?php endif; ?>
                </div>
                <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar pb-1 lg:pb-0">
                    <!-- Insurance Filter -->
                    <div class="relative group">
                        <button type="button" onclick="toggleFilter('insurance')" class="flex items-center gap-1.5 px-3 py-2 bg-slate-100 dark:bg-slate-800 rounded-lg text-xs font-semibold whitespace-nowrap">
                            Insurance <span class="material-symbols-outlined text-sm">expand_more</span>
                        </button>
                        <div id="insuranceFilter" class="hidden absolute top-full left-0 mt-1 w-48 bg-white dark:bg-card-dark rounded-lg shadow-lg border border-slate-200 dark:border-slate-800 z-10 p-2">
                            <form method="POST" class="space-y-2">
                                <?php foreach ($indianInsurances as $insurance): ?>
                                    <label class="flex items-center gap-2 text-xs cursor-pointer">
                                        <input type="checkbox" name="insurance[]" value="<?php echo $insurance; ?>"
                                            <?php echo in_array($insurance, $appData['filters']['insurance']) ? 'checked' : ''; ?>
                                            onchange="this.form.submit()"
                                            class="rounded border-slate-300 text-primary focus:ring-primary/50">
                                        <span class="text-slate-700 dark:text-slate-300"><?php echo $insurance; ?></span>
                                    </label>
                                <?php endforeach; ?>
                                <input type="hidden" name="update_filters" value="1">
                            </form>
                        </div>
                    </div>
                    
                    <!-- City Filter -->
                    <div class="relative group">
                        <button type="button" onclick="toggleFilter('city')" class="flex items-center gap-1.5 px-3 py-2 bg-slate-100 dark:bg-slate-800 rounded-lg text-xs font-semibold whitespace-nowrap">
                            City <span class="material-symbols-outlined text-sm">expand_more</span>
                        </button>
                        <div id="cityFilter" class="hidden absolute top-full left-0 mt-1 w-40 bg-white dark:bg-card-dark rounded-lg shadow-lg border border-slate-200 dark:border-slate-800 z-10 p-2">
                            <form method="POST" class="space-y-2">
                                <?php $cities = ['all' => 'All Cities', 'Mumbai' => 'Mumbai', 'Navi Mumbai' => 'Navi Mumbai']; ?>
                                <?php foreach ($cities as $value => $label): ?>
                                    <label class="flex items-center gap-2 text-xs cursor-pointer">
                                        <input type="radio" name="city" value="<?php echo $value; ?>"
                                            <?php echo ($appData['filters']['city'] ?? 'all') === $value ? 'checked' : ''; ?>
                                            onchange="this.form.submit()"
                                            class="border-slate-300 text-primary focus:ring-primary/50">
                                        <span class="text-slate-700 dark:text-slate-300"><?php echo $label; ?></span>
                                    </label>
                                <?php endforeach; ?>
                                <input type="hidden" name="update_filters" value="1">
                            </form>
                        </div>
                    </div>
                    
                    <!-- Distance Filter -->
                    <div class="relative group">
                        <button type="button" onclick="toggleFilter('distance')" class="flex items-center gap-1.5 px-3 py-2 bg-slate-100 dark:bg-slate-800 rounded-lg text-xs font-semibold whitespace-nowrap">
                            Distance <span class="material-symbols-outlined text-sm">expand_more</span>
                        </button>
                        <div id="distanceFilter" class="hidden absolute top-full left-0 mt-1 w-48 bg-white dark:bg-card-dark rounded-lg shadow-lg border border-slate-200 dark:border-slate-800 z-10 p-4">
                            <form method="POST" class="space-y-4">
                                <div>
                                    <label class="block text-xs font-medium text-slate-700 dark:text-slate-300 mb-2">
                                        Within <?php echo $appData['filters']['distance']; ?> km
                                    </label>
                                    <input type="range" name="distance" min="1" max="50" step="1" 
                                        value="<?php echo $appData['filters']['distance']; ?>"
                                        onchange="updateDistanceValue(this.value); this.form.submit()"
                                        class="w-full h-2 bg-slate-200 dark:bg-slate-700 rounded-lg appearance-none cursor-pointer [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:h-4 [&::-webkit-slider-thumb]:w-4 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-primary">
                                    <div class="flex justify-between text-[10px] text-slate-500 mt-1">
                                        <span>1 km</span>
                                        <span>50 km</span>
                                    </div>
                                </div>
                                <input type="hidden" name="update_filters" value="1">
                            </form>
                        </div>
                    </div>
                    
                    <div class="h-6 w-px bg-slate-200 dark:bg-slate-700 mx-2"></div>
                    
                    <!-- Sort Filter -->
                    <div class="relative group">
                        <button type="button" onclick="toggleFilter('sort')" class="flex items-center gap-1.5 px-3 py-2 bg-primary/10 text-primary rounded-lg text-xs font-bold whitespace-nowrap">
                            <span class="material-symbols-outlined text-sm">tune</span> Sort
                        </button>
                        <div id="sortFilter" class="hidden absolute top-full right-0 mt-1 w-48 bg-white dark:bg-card-dark rounded-lg shadow-lg border border-slate-200 dark:border-slate-800 z-10 p-2">
                            <form method="POST" class="space-y-2">
                                <?php $sortOptions = [
                                    'recommended' => 'Recommended',
                                    'rating' => 'Highest Rated',
                                    'distance' => 'Nearest First',
                                    'price_low' => 'Price: Low to High'
                                ]; ?>
                                <?php foreach ($sortOptions as $value => $label): ?>
                                    <label class="flex items-center gap-2 text-xs cursor-pointer">
                                        <input type="radio" name="sort_by" value="<?php echo $value; ?>"
                                            <?php echo $appData['filters']['sort_by'] === $value ? 'checked' : ''; ?>
                                            onchange="this.form.submit()"
                                            class="border-slate-300 text-primary focus:ring-primary/50">
                                        <span class="text-slate-700 dark:text-slate-300"><?php echo $label; ?></span>
                                    </label>
                                <?php endforeach; ?>
                                <input type="hidden" name="update_filters" value="1">
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Content Area -->
        <div class="flex flex-1 overflow-hidden" style="position: relative;">
            <!-- Doctor List (Left) -->
            <div class="w-full lg:w-[480px] xl:w-[560px] overflow-y-auto hide-scrollbar p-6 space-y-6 bg-background-light dark:bg-background-dark" style="z-index: 2;">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold"><?php echo $totalDoctors; ?> Doctors in Mumbai & Navi Mumbai</h3>
                        <?php if (isset($_GET['search_query'])): ?>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Results for "<?php echo htmlspecialchars($_GET['search_query']); ?>"</p>
                        <?php endif; ?>
                    </div>
                    <button class="text-sm font-semibold text-primary flex items-center gap-1">
                        Sort by: <?php echo $sortOptions[$appData['filters']['sort_by']] ?? 'Recommended'; ?> 
                        <span class="material-symbols-outlined text-sm">swap_vert</span>
                    </button>
                </div>

                <?php if (empty($displayDoctors)): ?>
                    <div class="bg-white dark:bg-card-dark rounded-xl p-8 text-center animate-fade-in">
                        <span class="material-symbols-outlined text-4xl text-slate-300 mb-4">search_off</span>
                        <h4 class="text-lg font-bold text-slate-700 dark:text-slate-300 mb-2">No doctors found</h4>
                        <p class="text-slate-500 dark:text-slate-400">Try adjusting your search criteria or filters.</p>
                        <a href="?action=clear_search" class="inline-block mt-4 bg-primary text-white px-6 py-2 rounded-lg font-bold text-sm hover:bg-primary/90 transition-colors">
                            Show All Doctors
                        </a>
                    </div>
                <?php else: ?>
                    <?php foreach ($displayDoctors as $doctor): ?>
                        <?php 
                            $isMumbai = strpos($doctor['location'], 'Mumbai,') !== false && strpos($doctor['location'], 'Navi Mumbai') === false;
                            $cityClass = $isMumbai ? 'border-l-4 border-blue-500' : 'border-l-4 border-green-500';
                        ?>
                        <div class="bg-white dark:bg-card-dark rounded-xl p-5 shadow-sm border border-slate-100 dark:border-slate-800 hover:shadow-md transition-all duration-200 doctor-card animate-fade-in <?php echo $cityClass; ?>"
                            data-doctor-id="<?php echo $doctor['id']; ?>"
                            data-lat="<?php echo $doctor['lat']; ?>"
                            data-lng="<?php echo $doctor['lng']; ?>"
                            data-city="<?php echo $isMumbai ? 'mumbai' : 'navi-mumbai'; ?>">
                            <div class="flex gap-5">
                                <div class="relative">
                                    <div class="w-24 h-24 rounded-xl bg-cover bg-center overflow-hidden shadow-sm" style="background-image: url('<?php echo $doctor['image']; ?>')"></div>
                                    <?php if ($doctor['available_today']): ?>
                                        <div class="absolute -bottom-2 -right-2 bg-green-500 border-4 border-white dark:border-card-dark w-6 h-6 rounded-full flex items-center justify-center shadow-md" title="Available Today">
                                            <span class="material-symbols-outlined text-white text-[14px] font-bold">check</span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($doctor['verified']): ?>
                                        <div class="absolute -top-2 -left-2 bg-blue-500 border-2 border-white dark:border-card-dark w-5 h-5 rounded-full flex items-center justify-center shadow-md" title="Verified Provider">
                                            <span class="material-symbols-outlined text-white text-[10px] font-bold">verified</span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="absolute -bottom-2 left-2 px-2 py-1 rounded-full text-[10px] font-bold text-white <?php echo $isMumbai ? 'bg-blue-500' : 'bg-green-500'; ?>">
                                        <?php echo $isMumbai ? 'Mumbai' : 'Navi Mumbai'; ?>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h4 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-primary transition-colors"><?php echo $doctor['name']; ?></h4>
                                            <p class="text-primary text-sm font-semibold"><?php echo $doctor['specialty']; ?> • <?php echo $doctor['subspecialty']; ?></p>
                                        </div>
                                        <div class="flex items-center gap-1 bg-yellow-50 dark:bg-yellow-900/20 px-2 py-1 rounded-lg">
                                            <span class="material-symbols-outlined text-yellow-500 text-sm fill-current">star</span>
                                            <span class="text-xs font-bold text-yellow-700 dark:text-yellow-500"><?php echo $doctor['rating']; ?></span>
                                        </div>
                                    </div>
                                    <div class="mt-4 flex flex-wrap gap-4 text-xs text-slate-500 dark:text-slate-400 font-medium">
                                        <span class="flex items-center gap-1">
                                            <span class="material-symbols-outlined text-sm">location_on</span> 
                                            <?php echo $doctor['distance']; ?> km • <?php echo $doctor['address']; ?>
                                        </span>
                                        <?php if (isset($doctor['price'])): ?>
                                            <span class="flex items-center gap-1">
                                                <span class="material-symbols-outlined text-sm">payments</span> 
                                                <?php echo $doctor['price']; ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if (isset($doctor['available_slots']) && $doctor['available_today']): ?>
                                            <span class="flex items-center gap-1 text-green-600 dark:text-green-400">
                                                <span class="material-symbols-outlined text-sm">schedule</span> 
                                                Available: <?php echo implode(', ', array_slice($doctor['available_slots'], 0, 2)); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mt-3 flex flex-wrap gap-2">
                                        <?php if (isset($doctor['insurance'])): ?>
                                            <?php foreach (array_slice($doctor['insurance'], 0, 2) as $insurance): ?>
                                                <span class="px-2 py-1 bg-slate-100 dark:bg-slate-800 text-[10px] font-medium text-slate-600 dark:text-slate-400 rounded">
                                                    <?php echo $insurance; ?>
                                                </span>
                                            <?php endforeach; ?>
                                            <?php if (count($doctor['insurance']) > 2): ?>
                                                <span class="px-2 py-1 bg-slate-100 dark:bg-slate-800 text-[10px] font-medium text-slate-600 dark:text-slate-400 rounded">
                                                    +<?php echo count($doctor['insurance']) - 2; ?> more
                                                </span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 flex gap-3 border-t border-slate-50 dark:border-slate-800/50 pt-5">
                                <button onclick="showDoctorProfile(<?php echo $doctor['id']; ?>)" 
                                    class="flex-1 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 rounded-lg text-sm font-bold transition-colors flex items-center justify-center gap-2">
                                    <span class="material-symbols-outlined text-sm">visibility</span>
                                    Profile
                                </button>
                                <button onclick="openBookingModal(<?php echo $doctor['id']; ?>)" 
                                    class="flex-[1.5] py-2.5 bg-primary text-white hover:bg-primary/90 rounded-lg text-sm font-bold transition-colors flex items-center justify-center gap-2">
                                    <span class="material-symbols-outlined text-sm">calendar_month</span>
                                    Book Appointment
                                </button>
                                <button onclick="showOnMap(<?php echo $doctor['lat']; ?>, <?php echo $doctor['lng']; ?>, '<?php echo addslashes($doctor['name']); ?>', '<?php echo $isMumbai ? 'mumbai' : 'navi-mumbai'; ?>')" 
                                    class="flex-1 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 rounded-lg text-sm font-bold transition-colors flex items-center justify-center gap-2">
                                    <span class="material-symbols-outlined text-sm">map</span>
                                    Map
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Appointment Reminders Section -->
            <div id="appointmentReminders" class="hidden lg:block w-full lg:w-[320px] xl:w-[400px] overflow-y-auto hide-scrollbar p-6 bg-white dark:bg-card-dark border-l border-slate-200 dark:border-slate-800" style="z-index: 2;">
                <div class="sticky top-0 bg-white dark:bg-card-dark pb-4 z-10">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-lg font-bold">Your Appointments</h3>
                        <span class="px-2 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full">
                            <?php echo $upcomingAppointments; ?> upcoming
                        </span>
                    </div>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Upcoming visits & reminders</p>
                </div>
                
                <?php if (empty($appData['appointments'])): ?>
                    <div class="text-center p-8">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center">
                            <span class="material-symbols-outlined text-slate-400">calendar_month</span>
                        </div>
                        <h4 class="text-lg font-bold text-slate-700 dark:text-slate-300 mb-2">No appointments yet</h4>
                        <p class="text-slate-500 dark:text-slate-400 mb-4">Book your first appointment with a doctor</p>
                        <button onclick="scrollToSearch()" class="bg-primary text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-primary/90 transition-colors">
                            Find Doctors
                        </button>
                    </div>
                <?php else: ?>
                    <div class="space-y-4">
                        <?php 
                        // Sort appointments by date
                        usort($appData['appointments'], function($a, $b) {
                            return strtotime($a['date_time']) <=> strtotime($b['date_time']);
                        });
                        
                        foreach ($appData['appointments'] as $appointment): 
                            $dateTime = new DateTime($appointment['date_time']);
                            $now = new DateTime();
                            $interval = $now->diff($dateTime);
                            $isToday = $dateTime->format('Y-m-d') === $now->format('Y-m-d');
                            $isTomorrow = $dateTime->format('Y-m-d') === $now->modify('+1 day')->format('Y-m-d');
                            
                            $doctor = getDoctorById($appointment['doctor_id']);
                        ?>
                            <div class="bg-slate-50 dark:bg-slate-800/50 rounded-xl p-4 border border-slate-200 dark:border-slate-700 hover:border-primary/30 transition-all duration-200">
                                <div class="flex items-start justify-between mb-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                                            <span class="material-symbols-outlined">medical_services</span>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-slate-900 dark:text-white"><?php echo $doctor['name']; ?></h4>
                                            <p class="text-sm text-primary"><?php echo $doctor['specialty']; ?></p>
                                        </div>
                                    </div>
                                    <span class="px-2 py-1 text-xs font-bold rounded-full 
                                        <?php echo $isToday ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 
                                               ($isTomorrow ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400' : 
                                               'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400'); ?>">
                                        <?php 
                                        if ($isToday) echo 'Today';
                                        elseif ($isTomorrow) echo 'Tomorrow';
                                        else echo 'In ' . $interval->days . ' days';
                                        ?>
                                    </span>
                                </div>
                                
                                <div class="space-y-2 text-sm">
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-300">
                                        <span class="material-symbols-outlined text-sm">calendar_month</span>
                                        <span><?php echo $dateTime->format('D, M d, Y'); ?></span>
                                    </div>
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-300">
                                        <span class="material-symbols-outlined text-sm">schedule</span>
                                        <span><?php echo $dateTime->format('h:i A'); ?></span>
                                    </div>
                                    <?php if (!empty($appointment['reason'])): ?>
                                        <div class="flex items-start gap-2 text-slate-600 dark:text-slate-300">
                                            <span class="material-symbols-outlined text-sm mt-0.5">note</span>
                                            <span class="text-xs"><?php echo htmlspecialchars($appointment['reason']); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="mt-4 pt-4 border-t border-slate-200 dark:border-slate-700">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-1 text-xs text-slate-500">
                                            <span class="material-symbols-outlined text-sm">notifications</span>
                                            <span>
                                                <?php 
                                                if ($interval->days == 0) {
                                                    echo 'Reminder in ' . (24 - $dateTime->format('H')) . ' hours';
                                                } elseif ($interval->days == 1) {
                                                    echo 'Reminder tomorrow';
                                                } else {
                                                    echo 'Reminder in ' . $interval->days . ' days';
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <form method="POST" class="inline">
                                            <input type="hidden" name="appointment_id" value="<?php echo $appointment['id']; ?>">
                                            <input type="hidden" name="cancel_appointment" value="1">
                                            <button type="submit" 
                                                class="text-xs text-red-500 hover:text-red-700 dark:text-red-400 font-medium">
                                                Cancel
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                        <!-- Add reminder notification for today's appointments -->
                        <?php 
                        $todayAppointments = array_filter($appData['appointments'], function($apt) {
                            $dateTime = new DateTime($apt['date_time']);
                            return $dateTime->format('Y-m-d') === date('Y-m-d');
                        });
                        
                        if (!empty($todayAppointments)): 
                        ?>
                            <div class="mt-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 flex items-center justify-center">
                                        <span class="material-symbols-outlined">notifications</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-green-800 dark:text-green-400">Reminder</h4>
                                        <p class="text-sm text-green-700 dark:text-green-300">
                                            You have <?php echo count($todayAppointments); ?> appointment(s) today
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Leaflet Map View (Right) - MUMBAI & NAVI MUMBAI -->
            <div class="hidden lg:block flex-1 relative bg-slate-200 dark:bg-slate-900" style="position: relative; z-index: 1; overflow: hidden;">
                <div id="map" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: 1;"></div>
                
                <!-- Map Legend -->
                <div class="absolute bottom-4 left-4 z-[1000] map-legend hidden lg:block" style="z-index: 1000;">
                    <div class="space-y-2">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                            <span class="text-xs">Mumbai Doctors</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            <span class="text-xs">Navi Mumbai Doctors</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                            <span class="text-xs">Your Location</span>
                        </div>
                    </div>
                </div>
                
                <!-- Map Controls -->
                <div class="absolute top-4 right-4 flex flex-col gap-2 z-[1000]" style="z-index: 1000;">
                    <button onclick="zoomIn()" class="w-10 h-10 bg-white dark:bg-card-dark rounded-lg shadow-lg flex items-center justify-center text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined">add</span>
                    </button>
                    <button onclick="zoomOut()" class="w-10 h-10 bg-white dark:bg-card-dark rounded-lg shadow-lg flex items-center justify-center text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined">remove</span>
                    </button>
                    <button onclick="locateMe()" class="w-10 h-10 bg-white dark:bg-card-dark rounded-lg shadow-lg flex items-center justify-center text-primary hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined">my_location</span>
                    </button>
                    <button onclick="resetView()" class="w-10 h-10 bg-white dark:bg-card-dark rounded-lg shadow-lg flex items-center justify-center text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined">home</span>
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- Floating AI Assistant Bubble -->
    <button onclick="toggleChat()" class="fixed bottom-6 right-6 w-14 h-14 bg-primary text-white rounded-full shadow-2xl flex items-center justify-center hover:scale-110 transition-transform group" style="z-index: 99999;">
        <span class="material-symbols-outlined text-3xl group-hover:rotate-12 transition-transform">smart_toy</span>
        <div class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 border-2 border-white rounded-full animate-pulse-slow"></div>
    </button>

    <!-- AI Chat Window -->
    <div id="chatWindow" class="<?php echo $chatVisible ? 'flex' : 'hidden'; ?> fixed bottom-24 right-6 w-96 max-h-[600px] h-[80vh] bg-white dark:bg-card-dark rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-800 flex-col" style="z-index: 99999;">
        <!-- Chat Header -->
        <div class="p-4 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between bg-primary/5 rounded-t-2xl">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-primary/20 text-primary rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined">auto_awesome</span>
                </div>
                <div>
                    <h5 class="text-sm font-bold">HealthSync AI</h5>
                    <div class="flex items-center gap-1.5">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse-slow"></div>
                        <span class="text-[10px] text-slate-500 uppercase font-bold tracking-wider">Assistant Online</span>
                    </div>
                </div>
            </div>
            <button onclick="toggleChat()" class="text-slate-400 hover:text-slate-600">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <!-- Chat Body -->
        <div id="chatBody" class="flex-1 overflow-y-auto p-4 space-y-4 bg-slate-50/50 dark:bg-background-dark/50">
            <?php foreach ($appData['chat_messages'] as $msg): ?>
                <?php if ($msg['sender'] == 'bot'): ?>
                    <div class="flex gap-2 max-w-[85%] animate-slide-in">
                        <div class="min-w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                            <span class="material-symbols-outlined text-lg">smart_toy</span>
                        </div>
                        <div class="bg-white dark:bg-slate-800 p-3 rounded-2xl rounded-tl-none shadow-sm text-sm leading-relaxed">
                            <?php echo $msg['message']; ?>
                            <div class="text-[10px] text-slate-400 mt-1"><?php echo $msg['timestamp']; ?></div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex gap-2 max-w-[85%] ml-auto justify-end animate-slide-in">
                        <div class="bg-primary text-white p-3 rounded-2xl rounded-tr-none shadow-md text-sm leading-relaxed">
                            <?php echo $msg['message']; ?>
                            <div class="text-[10px] text-white/70 mt-1 text-right"><?php echo $msg['timestamp']; ?></div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <div id="chatTypingIndicator" class="hidden flex gap-2 max-w-[85%]">
                <div class="min-w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                    <span class="material-symbols-outlined text-lg">smart_toy</span>
                </div>
                <div class="bg-white dark:bg-slate-800 p-3 rounded-2xl rounded-tl-none shadow-sm">
                    <div class="flex gap-1">
                        <div class="w-2 h-2 bg-slate-400 rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-slate-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                        <div class="w-2 h-2 bg-slate-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chat Input -->
        <div class="p-4 border-t border-slate-100 dark:border-slate-800">
            <form method="POST" action="" id="chatForm" class="flex gap-2 bg-slate-100 dark:bg-slate-800 p-1.5 rounded-xl border border-transparent focus-within:border-primary/30 transition-all">
                <input name="chat_message" id="chatInput" class="flex-1 bg-transparent border-none focus:ring-0 text-sm py-1.5" placeholder="Describe your symptoms..." type="text" required/>
                <button type="submit" class="w-9 h-9 bg-primary text-white rounded-lg flex items-center justify-center shadow-md shadow-primary/20 hover:bg-primary/90 transition-colors">
                    <span class="material-symbols-outlined text-lg">send</span>
                </button>
            </form>
            <p class="text-[10px] text-center text-slate-400 mt-2">AI suggestions are for guidance, not medical diagnosis.</p>
        </div>
    </div>

    <!-- LEAFLET JS (NO API KEY REQUIRED) -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
    
    <script>
        // ============== LEAFLET MAP SETUP FOR MUMBAI & NAVI MUMBAI ==============
        let map;
        let markers = [];
        // Center between Mumbai and Navi Mumbai
        const defaultLocation = [19.0545, 72.8537];
        const mumbaiBounds = [
            [18.9, 72.7],  // Southwest corner
            [19.3, 73.2]   // Northeast corner
        ];
        
        // Initialize map when page loads
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(initMap, 500);
        });
        
        function initMap() {
            // Create map instance centered on Mumbai Metropolitan Region
            map = L.map('map', {
                maxBounds: mumbaiBounds,
                maxBoundsViscosity: 1.0
            }).setView(defaultLocation, 11);
            
            // Add OpenStreetMap tiles with Indian map style
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors | Mumbai & Navi Mumbai Doctors',
                maxZoom: 18,
                minZoom: 10
            }).addTo(map);
            
            // Force map z-index to be low
            const mapContainer = document.getElementById('map');
            if (mapContainer) {
                mapContainer.style.zIndex = '1';
            }
            
            // Add markers for all displayed doctors
            <?php foreach ($displayDoctors as $doctor): ?>
                <?php 
                    $isMumbai = strpos($doctor['location'], 'Mumbai,') !== false && strpos($doctor['location'], 'Navi Mumbai') === false;
                    $city = $isMumbai ? 'mumbai' : 'navi-mumbai';
                ?>
                addMarker(
                    <?php echo $doctor['lat']; ?>,
                    <?php echo $doctor['lng']; ?>,
                    '<?php echo addslashes($doctor['name']); ?>',
                    '<?php echo addslashes($doctor['specialty']); ?>',
                    '<?php echo addslashes($doctor['address']); ?>',
                    <?php echo $doctor['id']; ?>,
                    <?php echo $doctor['available_today'] ? 'true' : 'false'; ?>,
                    '<?php echo $city; ?>'
                );
            <?php endforeach; ?>
            
            // Add Mumbai and Navi Mumbai labels
            addCityLabels();
        }
        
        // Add marker to map with different colors for Mumbai/Navi Mumbai
        function addMarker(lat, lng, name, specialty, address, id, available, city) {
            // Determine color based on city
            let color, markerClass;
            if (city === 'mumbai') {
                color = '#3b82f6'; // Blue for Mumbai
                markerClass = 'mumbai';
            } else {
                color = '#10b981'; // Green for Navi Mumbai
                markerClass = 'navi-mumbai';
            }
            
            if (!available) {
                color = '#94a3b8'; // Gray for unavailable
            }
            
            // Create custom icon
            const icon = L.divIcon({
                html: `<div class="custom-marker ${markerClass} ${available ? 'available' : 'unavailable'}">${name.split(' ')[1]}</div>`,
                className: 'custom-div-icon',
                iconSize: [100, 40],
                iconAnchor: [50, 40]
            });
            
            // Add marker to map
            const marker = L.marker([lat, lng], { icon: icon }).addTo(map);
            
            // Add popup with doctor info
            marker.bindPopup(`
                <div class="p-3 max-w-xs">
                    <h3 class="font-bold text-lg text-primary">${name}</h3>
                    <p class="text-sm text-slate-600">${specialty}</p>
                    <p class="text-xs text-slate-500 mt-2">${address}</p>
                    <div class="mt-2 flex items-center gap-2">
                        <span class="px-2 py-1 rounded-full text-[10px] font-bold text-white ${city === 'mumbai' ? 'bg-blue-500' : 'bg-green-500'}">
                            ${city === 'mumbai' ? 'Mumbai' : 'Navi Mumbai'}
                        </span>
                        <span class="px-2 py-1 rounded-full text-[10px] font-bold ${available ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'}">
                            ${available ? 'Available Today' : 'Not Available'}
                        </span>
                    </div>
                    <div class="mt-3 flex gap-2">
                        <button onclick="showOnMap(${lat}, ${lng}, '${name}', '${city}')" class="px-3 py-1 bg-primary text-white text-xs rounded-lg hover:bg-primary/90 transition-colors">
                            Center Map
                        </button>
                        <button onclick="openBookingModal(${id})" class="px-3 py-1 bg-green-500 text-white text-xs rounded-lg hover:bg-green-600 transition-colors">
                            Book Now
                        </button>
                    </div>
                </div>
            `);
            
            // Store marker reference
            markers.push({ marker, lat, lng, id, city });
            
            // Add click event
            marker.on('click', function() {
                highlightDoctorCard(id);
            });
        }
        
        // Add city labels to map
        function addCityLabels() {
            // Mumbai label
            L.marker([19.0760, 72.8777], {
                icon: L.divIcon({
                    html: '<div class="text-blue-600 font-bold text-sm bg-white/80 px-2 py-1 rounded">Mumbai</div>',
                    className: 'city-label',
                    iconSize: [80, 30]
                })
            }).addTo(map);
            
            // Navi Mumbai label
            L.marker([19.0330, 73.0297], {
                icon: L.divIcon({
                    html: '<div class="text-green-600 font-bold text-sm bg-white/80 px-2 py-1 rounded">Navi Mumbai</div>',
                    className: 'city-label',
                    iconSize: [100, 30]
                })
            }).addTo(map);
        }
        
        // Show specific location on map
        function showOnMap(lat, lng, name, city) {
            map.setView([lat, lng], 14);
            
            // Open popup for this marker
            markers.forEach(item => {
                if (item.lat === lat && item.lng === lng) {
                    item.marker.openPopup();
                }
            });
        }
        
        // Reset to default view
        function resetView() {
            map.setView(defaultLocation, 11);
        }
        
        // Map controls
        function zoomIn() {
            map.zoomIn();
        }
        
        function zoomOut() {
            map.zoomOut();
        }
        
        function locateMe() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    const userLocation = [position.coords.latitude, position.coords.longitude];
                    map.setView(userLocation, 14);
                    
                    // Check if user is in Mumbai/Navi Mumbai area
                    const inMumbaiArea = (
                        userLocation[0] >= 18.9 && userLocation[0] <= 19.3 &&
                        userLocation[1] >= 72.7 && userLocation[1] <= 73.2
                    );
                    
                    if (!inMumbaiArea) {
                        alert('You are outside Mumbai area. Map shows Mumbai & Navi Mumbai doctors.');
                    }
                    
                    // Add user location marker
                    L.marker(userLocation, {
                        icon: L.divIcon({
                            html: '<div class="user-location-marker"></div>',
                            className: 'user-location-icon',
                            iconSize: [20, 20],
                            iconAnchor: [10, 10]
                        })
                    }).addTo(map)
                    .bindPopup('Your Location')
                    .openPopup();
                }, (error) => {
                    console.error('Geolocation error:', error);
                    alert('Unable to get your location. Please enable location services.');
                });
            } else {
                alert('Geolocation is not supported by your browser.');
            }
        }
        
        // Highlight doctor card when marker is clicked
        function highlightDoctorCard(doctorId) {
            document.querySelectorAll('[data-doctor-id]').forEach(card => {
                card.classList.remove('ring-2', 'ring-primary', 'ring-offset-2');
            });
            
            const card = document.querySelector(`[data-doctor-id="${doctorId}"]`);
            if (card) {
                card.classList.add('ring-2', 'ring-primary', 'ring-offset-2');
                card.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
        
        // ============== REST OF YOUR JAVASCRIPT FUNCTIONS ==============
        let activeFilter = null;
        
        // Toggle chat window
        function toggleChat() {
            const chatWindow = document.getElementById('chatWindow');
            chatWindow.classList.toggle('hidden');
            
            if (!chatWindow.classList.contains('hidden')) {
                setTimeout(() => {
                    const chatBody = document.getElementById('chatBody');
                    if (chatBody) {
                        chatBody.scrollTop = chatBody.scrollHeight;
                    }
                }, 100);
                document.getElementById('chatInput').focus();
            }
        }
        
        // Chat form handling
        document.getElementById('chatForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            const form = this;
            const typingIndicator = document.getElementById('chatTypingIndicator');
            
            // Show typing indicator
            typingIndicator.classList.remove('hidden');
            const chatBody = document.getElementById('chatBody');
            chatBody.scrollTop = chatBody.scrollHeight;
            
            // Submit form
            setTimeout(() => {
                form.submit();
            }, 1000);
        });
        
        // Show doctor profile
        function showDoctorProfile(doctorId) {
            const doctor = <?php echo json_encode(array_column($appData['doctors'], null, 'id')); ?>[doctorId];
            if (doctor) {
                const modalContent = `
                    <div class="fixed inset-0 z-[110] modal-overlay">
                        <div class="flex items-center justify-center min-h-screen p-4">
                            <div class="bg-white dark:bg-card-dark rounded-2xl shadow-2xl w-full max-w-2xl transform transition-all animate-slide-in">
                                <div class="p-6 border-b border-slate-100 dark:border-slate-800">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">Doctor Profile</h3>
                                        <button onclick="document.querySelector('.modal-overlay').remove()" class="text-slate-400 hover:text-slate-600">
                                            <span class="material-symbols-outlined">close</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="flex gap-6">
                                        <div class="w-32 h-32 rounded-xl bg-cover bg-center" style="background-image: url('${doctor.image}')"></div>
                                        <div class="flex-1">
                                            <h4 class="text-2xl font-bold text-slate-900 dark:text-white">${doctor.name}</h4>
                                            <p class="text-primary text-lg font-semibold">${doctor.specialty} • ${doctor.subspecialty}</p>
                                            <p class="text-slate-600 dark:text-slate-300 mt-2">${doctor.address}</p>
                                            <div class="mt-4 flex items-center gap-4">
                                                <div class="flex items-center gap-1 bg-yellow-50 dark:bg-yellow-900/20 px-3 py-1.5 rounded-lg">
                                                    <span class="material-symbols-outlined text-yellow-500 fill-current">star</span>
                                                    <span class="font-bold text-yellow-700 dark:text-yellow-500">${doctor.rating}/5.0</span>
                                                </div>
                                                <span class="px-3 py-1.5 rounded-lg ${doctor.available_today ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'} font-medium">
                                                    ${doctor.available_today ? 'Available Today' : 'Next: ' + doctor.next_available}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6 grid grid-cols-2 gap-4">
                                        <div>
                                            <h5 class="font-bold text-slate-700 dark:text-slate-300 mb-2">Available Slots</h5>
                                            <div class="flex flex-wrap gap-2">
                                                ${doctor.available_slots.map(slot => `
                                                    <span class="px-3 py-1 bg-slate-100 dark:bg-slate-800 rounded-lg text-sm">${slot}</span>
                                                `).join('')}
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="font-bold text-slate-700 dark:text-slate-300 mb-2">Insurance Accepted</h5>
                                            <div class="flex flex-wrap gap-2">
                                                ${doctor.insurance.map(ins => `
                                                    <span class="px-3 py-1 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 rounded-lg text-sm">${ins}</span>
                                                `).join('')}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6">
                                        <button onclick="openBookingModal(${doctorId}); document.querySelector('.modal-overlay').remove()" 
                                            class="w-full py-3 bg-primary text-white hover:bg-primary/90 rounded-lg text-sm font-bold transition-colors">
                                            Book Appointment with ${doctor.name}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                document.body.insertAdjacentHTML('beforeend', modalContent);
            }
        }
        
        // Open booking modal
        function openBookingModal(doctorId) {
            const doctor = <?php echo json_encode(array_column($appData['doctors'], null, 'id')); ?>[doctorId];
            if (doctor) {
                document.getElementById('modalDoctorId').value = doctorId;
                document.getElementById('doctorInfo').innerHTML = `
                    <div class="flex items-center gap-3 p-3 bg-slate-100 dark:bg-slate-800 rounded-lg">
                        <div class="w-16 h-16 rounded-lg bg-cover bg-center" style="background-image: url('${doctor.image}')"></div>
                        <div>
                            <h4 class="font-bold text-slate-900 dark:text-white">${doctor.name}</h4>
                            <p class="text-sm text-primary">${doctor.specialty}</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">${doctor.address}</p>
                        </div>
                    </div>
                `;
                
                // Set min date/time for appointment
                const now = new Date();
                now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                document.querySelector('input[name="appointment_datetime"]').min = now.toISOString().slice(0, 16);
                
                document.getElementById('appointmentModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }
        
        // Close modal
        function closeModal() {
            document.getElementById('appointmentModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        
        // Toggle notifications dropdown
        function toggleNotifications() {
            const dropdown = document.getElementById('notificationsDropdown');
            dropdown.classList.toggle('hidden');
            
            // Close other dropdowns
            closeAllFilters();
        }
        
        // Toggle filter dropdowns
        function toggleFilter(filterName) {
            const dropdown = document.getElementById(filterName + 'Filter');
            
            if (activeFilter === filterName) {
                dropdown.classList.add('hidden');
                activeFilter = null;
            } else {
                closeAllFilters();
                dropdown.classList.remove('hidden');
                activeFilter = filterName;
            }
        }
        
        // Close all filter dropdowns
        function closeAllFilters() {
            document.querySelectorAll('[id$="Filter"]').forEach(filter => {
                filter.classList.add('hidden');
            });
            document.getElementById('notificationsDropdown').classList.add('hidden');
            activeFilter = null;
        }
        
        // Clear all notifications
        function clearAllNotifications() {
            if (confirm('Clear all notifications?')) {
                fetch('?clear_all_notifications=1', { method: 'POST' })
                    .then(() => location.reload());
            }
        }
        
        // Scroll to search
        function scrollToSearch() {
            document.querySelector('input[name="search_query"]').focus();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        
        // Update distance value display
        function updateDistanceValue(value) {
            const label = document.querySelector('[for="distance"]');
            if (label) {
                label.textContent = `Within ${value} km`;
            }
        }
        
        // Auto-hide notifications after 5 seconds
        <?php if ($unreadNotifications > 0): ?>
            setTimeout(() => {
                const dropdown = document.getElementById('notificationsDropdown');
                if (!dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            }, 5000);
        <?php endif; ?>
        
        // Auto-scroll chat to bottom on page load
        document.addEventListener('DOMContentLoaded', function() {
            const chatBody = document.getElementById('chatBody');
            if (chatBody) {
                chatBody.scrollTop = chatBody.scrollHeight;
            }
            
            // Close dropdowns when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('[id$="Filter"]') && !e.target.closest('[onclick*="toggleFilter"]')) {
                    closeAllFilters();
                }
                if (!e.target.closest('#notificationsDropdown') && !e.target.closest('[onclick*="toggleNotifications"]')) {
                    document.getElementById('notificationsDropdown').classList.add('hidden');
                }
                if (!e.target.closest('#appointmentModal') && !e.target.closest('[onclick*="openBookingModal"]')) {
                    closeModal();
                }
            });
            
            // Show success notification if there are any
            <?php if (!empty($appData['notifications'])): ?>
                const latestNotification = <?php echo json_encode(end($appData['notifications'])); ?>;
                if (latestNotification && !latestNotification.read) {
                    showToast(latestNotification.title, latestNotification.message, latestNotification.type);
                }
            <?php endif; ?>
        });
        
        // Toast notification
        function showToast(title, message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `fixed top-4 right-4 z-50 max-w-sm bg-white dark:bg-card-dark rounded-lg shadow-lg border border-slate-200 dark:border-slate-800 p-4 transform transition-all animate-slide-in`;
            toast.innerHTML = `
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-lg bg-${type}-500/20 text-${type}-500 flex items-center justify-center">
                        <span class="material-symbols-outlined text-sm">
                            ${type === 'success' ? 'check_circle' : 'info'}
                        </span>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-sm text-slate-900 dark:text-white">${title}</h4>
                        <p class="text-xs text-slate-600 dark:text-slate-300 mt-1">${message}</p>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-slate-400 hover:text-slate-600">
                        <span class="material-symbols-outlined text-sm">close</span>
                    </button>
                </div>
            `;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(-10px)';
                setTimeout(() => toast.remove(), 300);
            }, 5000);
        }
    </script>
</body>
</html>