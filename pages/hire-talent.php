<?php
// Get filter parameters from URL
$searchTerm = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';
$ratingFilter = isset($_GET['rating']) ? floatval($_GET['rating']) : 0;
$experienceFilter = isset($_GET['experience']) ? intval($_GET['experience']) : 0;

// Sample talent data
$talents = [
    [
        'id' => 1,
        'name' => 'Roberto Santos',
        'skill' => 'Mason',
        'category' => 'Construction',
        'experience' => 15,
        'rate' => '₱600/day',
        'contact' => '+63 912 345 6701',
        'location' => 'Pardo, Cebu City',
        'rating' => 4.8,
        'image' => '👷',
        'description' => 'Expert in house construction, concrete work, and masonry. Specializes in residential buildings.'
    ],
    [
        'id' => 2,
        'name' => 'Mario Reyes',
        'skill' => 'Plumber',
        'category' => 'Plumbing',
        'experience' => 10,
        'rate' => '₱500/day',
        'contact' => '+63 912 345 6702',
        'location' => 'Pardo, Cebu City',
        'rating' => 4.9,
        'image' => '👷',
        'description' => 'Licensed plumber. Services include pipe installation, repair, and water system maintenance.'
    ],
    [
        'id' => 3,
        'name' => 'Jose Garcia',
        'skill' => 'Electrician',
        'category' => 'Electrical',
        'experience' => 12,
        'rate' => '₱550/day',
        'contact' => '+63 912 345 6703',
        'location' => 'Pardo, Cebu City',
        'rating' => 4.7,
        'image' => '👷',
        'description' => 'Certified electrician for residential and commercial wiring, lighting, and electrical troubleshooting.'
    ],
    [
        'id' => 4,
        'name' => 'Pedro Cruz',
        'skill' => 'Carpenter',
        'category' => 'Carpentry',
        'experience' => 18,
        'rate' => '₱650/day',
        'contact' => '+63 912 345 6704',
        'location' => 'Pardo, Cebu City',
        'rating' => 5.0,
        'image' => '👷',
        'description' => 'Master carpenter specializing in custom furniture, cabinetry, and woodwork installations.'
    ],
    [
        'id' => 5,
        'name' => 'Antonio Flores',
        'skill' => 'Painter',
        'category' => 'Painting',
        'experience' => 8,
        'rate' => '₱450/day',
        'contact' => '+63 912 345 6705',
        'location' => 'Pardo, Cebu City',
        'rating' => 4.6,
        'image' => '👷',
        'description' => 'Professional house painter. Interior and exterior painting, wall finishing, and decorative work.'
    ],
    [
        'id' => 6,
        'name' => 'Ricardo Mendoza',
        'skill' => 'Welder',
        'category' => 'Welding',
        'experience' => 14,
        'rate' => '₱700/day',
        'contact' => '+63 912 345 6706',
        'location' => 'Pardo, Cebu City',
        'rating' => 4.8,
        'image' => '👷',
        'description' => 'Skilled welder for metal fabrication, gate installation, and structural steel work.'
    ],
    [
        'id' => 7,
        'name' => 'Fernando Ramos',
        'skill' => 'Tile Setter',
        'category' => 'Construction',
        'experience' => 11,
        'rate' => '₱500/day',
        'contact' => '+63 912 345 6707',
        'location' => 'Pardo, Cebu City',
        'rating' => 4.7,
        'image' => '👷',
        'description' => 'Expert in floor and wall tiling, bathroom and kitchen installations, tile repair and replacement.'
    ],
    [
        'id' => 8,
        'name' => 'Miguel Torres',
        'skill' => 'Roofer',
        'category' => 'Roofing',
        'experience' => 13,
        'rate' => '₱600/day',
        'contact' => '+63 912 345 6708',
        'location' => 'Pardo, Cebu City',
        'rating' => 4.9,
        'image' => '👷',
        'description' => 'Roofing specialist for installation, repair, and maintenance. Works with various roofing materials.'
    ],
    [
        'id' => 9,
        'name' => 'Carlos Villanueva',
        'skill' => 'Landscaper',
        'category' => 'Landscaping',
        'experience' => 9,
        'rate' => '₱480/day',
        'contact' => '+63 912 345 6709',
        'location' => 'Pardo, Cebu City',
        'rating' => 4.5,
        'image' => '👷',
        'description' => 'Garden design and maintenance, lawn care, tree trimming, and outdoor beautification services.'
    ],
    [
        'id' => 10,
        'name' => 'Ramon Aquino',
        'skill' => 'HVAC Technician',
        'category' => 'HVAC',
        'experience' => 10,
        'rate' => '₱650/day',
        'contact' => '+63 912 345 6710',
        'location' => 'Pardo, Cebu City',
        'rating' => 4.8,
        'image' => '👷',
        'description' => 'Air conditioning installation, repair, and maintenance. Refrigeration and ventilation services.'
    ],
    [
        'id' => 11,
        'name' => 'Daniel Castillo',
        'skill' => 'Glass & Aluminum',
        'category' => 'Construction',
        'experience' => 7,
        'rate' => '₱520/day',
        'contact' => '+63 912 345 6711',
        'location' => 'Pardo, Cebu City',
        'rating' => 4.6,
        'image' => '👷',
        'description' => 'Glass and aluminum installation for windows, doors, sliding frames, and shower enclosures.'
    ],
    [
        'id' => 12,
        'name' => 'Jorge Bautista',
        'skill' => 'General Helper',
        'category' => 'General Labor',
        'experience' => 5,
        'rate' => '₱400/day',
        'contact' => '+63 912 345 6712',
        'location' => 'Pardo, Cebu City',
        'rating' => 4.4,
        'image' => '👷',
        'description' => 'Reliable general construction helper. Assists with various tasks, material handling, and cleanup.'
    ]
];

// Filter talents based on criteria
$filteredTalents = [];
foreach ($talents as $talent) {
    $matchesSearch = empty($searchTerm) || 
                     strpos(strtolower($talent['name']), $searchTerm) !== false || 
                     strpos(strtolower($talent['skill']), $searchTerm) !== false;
    
    $matchesCategory = empty($categoryFilter) || $talent['category'] === $categoryFilter;
    $matchesRating = $talent['rating'] >= $ratingFilter;
    $matchesExperience = $talent['experience'] >= $experienceFilter;
    
    if ($matchesSearch && $matchesCategory && $matchesRating && $matchesExperience) {
        $filteredTalents[] = $talent;
    }
}

$talentCount = count($filteredTalents);
?>

<div class="container" style="padding: 2rem 1rem; max-width: 1400px; margin: 0 auto;">
    <div class="page-header" style="margin-bottom: 2rem;">
        <h1 style="color: #0A3A6E; font-size: 2rem; margin-bottom: 0.5rem;">
            💼 Hire a Talent
        </h1>
        <p style="color: #5A6C7D; font-size: 1rem;">
            Find skilled workers and professionals in Barangay Pardo
        </p>
    </div>

    <div style="display: grid; grid-template-columns: 280px 1fr; gap: 2rem;">
        <!-- Left Sidebar - Filters -->
        <div class="filters-sidebar" style="background: white; padding: 1.5rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); height: fit-content; position: sticky; top: 20px;">
            <h3 style="color: #0A3A6E; font-size: 1.2rem; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid #E1E8ED;">
                 Filters
            </h3>

            <form method="GET" action="">
                <input type="hidden" name="page" value="hire-talent">
                
                <!-- Search -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">
                        Search
                    </label>
                    <input type="text" name="search" value="<?= htmlspecialchars($searchTerm) ?>" 
                        placeholder="Search by name or skill..." 
                        style="width: 100%; padding: 0.75rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 0.9rem;">
                </div>

                <!-- Category Filter -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">
                        Category
                    </label>
                    <select name="category" style="width: 100%; padding: 0.75rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 0.9rem; background: white; cursor: pointer;">
                        <option value="">All Categories</option>
                        <option value="Construction" <?= $categoryFilter === 'Construction' ? 'selected' : '' ?>>Construction</option>
                        <option value="Plumbing" <?= $categoryFilter === 'Plumbing' ? 'selected' : '' ?>>Plumbing</option>
                        <option value="Electrical" <?= $categoryFilter === 'Electrical' ? 'selected' : '' ?>>Electrical</option>
                        <option value="Carpentry" <?= $categoryFilter === 'Carpentry' ? 'selected' : '' ?>>Carpentry</option>
                        <option value="Painting" <?= $categoryFilter === 'Painting' ? 'selected' : '' ?>>Painting</option>
                        <option value="Welding" <?= $categoryFilter === 'Welding' ? 'selected' : '' ?>>Welding</option>
                        <option value="Roofing" <?= $categoryFilter === 'Roofing' ? 'selected' : '' ?>>Roofing</option>
                        <option value="Landscaping" <?= $categoryFilter === 'Landscaping' ? 'selected' : '' ?>>Landscaping</option>
                        <option value="HVAC" <?= $categoryFilter === 'HVAC' ? 'selected' : '' ?>>HVAC</option>
                        <option value="General Labor" <?= $categoryFilter === 'General Labor' ? 'selected' : '' ?>>General Labor</option>
                    </select>
                </div>

                <!-- Rating Filter -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">
                        Minimum Rating
                    </label>
                    <select name="rating" style="width: 100%; padding: 0.75rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 0.9rem; background: white; cursor: pointer;">
                        <option value="0" <?= $ratingFilter == 0 ? 'selected' : '' ?>>All Ratings</option>
                        <option value="4.5" <?= $ratingFilter == 4.5 ? 'selected' : '' ?>>4.5+ ⭐</option>
                        <option value="4.7" <?= $ratingFilter == 4.7 ? 'selected' : '' ?>>4.7+ ⭐⭐</option>
                        <option value="4.9" <?= $ratingFilter == 4.9 ? 'selected' : '' ?>>4.9+ ⭐⭐⭐</option>
                    </select>
                </div>

                <!-- Experience Filter -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">
                        Experience
                    </label>
                    <select name="experience" style="width: 100%; padding: 0.75rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 0.9rem; background: white; cursor: pointer;">
                        <option value="0" <?= $experienceFilter == 0 ? 'selected' : '' ?>>Any Experience</option>
                        <option value="5" <?= $experienceFilter == 5 ? 'selected' : '' ?>>5+ years</option>
                        <option value="10" <?= $experienceFilter == 10 ? 'selected' : '' ?>>10+ years</option>
                        <option value="15" <?= $experienceFilter == 15 ? 'selected' : '' ?>>15+ years</option>
                    </select>
                </div>

                <!-- Apply Filters Button -->
                <button type="submit" style="width: 100%; padding: 0.875rem; background: #0A3A6E; color: white; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s; font-size: 0.9rem; margin-bottom: 0.5rem;">
                    Apply Filters
                </button>
                
                <!-- Clear Filters Button -->
                <a href="?page=hire-talent" style="display: block; margin-left: 43px; width: 50%; padding: 0.875rem; background: #E1E8ED; color: #1A2332; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s; font-size: 0.9rem; text-align: center; text-decoration: none;">
                    Clear All Filters
                </a>
            </form>
        </div>

        <!-- Right Side - Talent Cards -->
        <div>
            <div style="margin-bottom: 1.5rem; color: #5A6C7D; font-size: 0.95rem;">
                Showing <strong><?= $talentCount ?></strong> talent<?= $talentCount != 1 ? 's' : '' ?>
            </div>

            <?php if ($talentCount > 0): ?>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 1.5rem;">
                <?php foreach ($filteredTalents as $talent): ?>
                <div class="talent-card" style="background: white; border-radius: 12px; padding: 1.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: all 0.3s; border: 2px solid transparent;">
                    
                    <div style="text-align: center; margin-bottom: 1rem;">
                        <div style="font-size: 3.5rem; margin-bottom: 0.5rem;"><?= $talent['image'] ?></div>
                        <h3 style="color: #0A3A6E; font-size: 1.2rem; margin-bottom: 0.3rem;"><?= htmlspecialchars($talent['name']) ?></h3>
                        <div style="display: inline-block; background: #FDB913; color: #1A2332; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600; margin-bottom: 0.5rem;">
                            <?= htmlspecialchars($talent['skill']) ?>
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem; padding-bottom: 1rem; border-bottom: 1px solid #E1E8ED;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                            <span style="color: #5A6C7D; font-size: 0.9rem;">⭐ Rating:</span>
                            <span style="color: #1A2332; font-weight: 600; font-size: 0.9rem;"><?= $talent['rating'] ?>/5.0</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                            <span style="color: #5A6C7D; font-size: 0.9rem;">💼 Experience:</span>
                            <span style="color: #1A2332; font-weight: 600; font-size: 0.9rem;"><?= $talent['experience'] ?> years</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                            <span style="color: #5A6C7D; font-size: 0.9rem;">💰 Rate:</span>
                            <span style="color: #0A3A6E; font-weight: 700; font-size: 0.9rem;"><?= htmlspecialchars($talent['rate']) ?></span>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: #5A6C7D; font-size: 0.9rem;">📍 Location:</span>
                            <span style="color: #1A2332; font-size: 0.85rem;"><?= htmlspecialchars($talent['location']) ?></span>
                        </div>
                    </div>

                    <p style="color: #5A6C7D; font-size: 0.85rem; line-height: 1.5; margin-bottom: 1rem; min-height: 60px;">
                        <?= htmlspecialchars($talent['description']) ?>
                    </p>

                    <div style="display: flex; gap: 0.5rem;">
                        <a href="tel:<?= str_replace(' ', '', $talent['contact']) ?>" 
                           style="flex: 1; padding: 0.75rem; background: #0A3A6E; color: white; text-align: center; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: all 0.3s;">
                            📞 Call
                        </a>
                        <a href="sms:<?= str_replace(' ', '', $talent['contact']) ?>" 
                           style="flex: 1; padding: 0.75rem; background: #28A745; color: white; text-align: center; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: all 0.3s;">
                            💬 Message
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <!-- No Results Message -->
            <div style="text-align: center; padding: 4rem 2rem; background: white; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <div style="font-size: 4rem; margin-bottom: 1rem;">🔍</div>
                <h3 style="color: #0A3A6E; margin-bottom: 0.5rem;">No Talents Found</h3>
                <p style="color: #5A6C7D; margin-bottom: 1.5rem;">Try adjusting your filters or search criteria</p>
                <a href="?page=hire-talent" style="display: inline-block; padding: 0.875rem 2rem; background: #0A3A6E; color: white; border-radius: 8px; text-decoration: none; font-weight: 600;">
                    Clear Filters
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
.talent-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    border-color: #0A3A6E;
}

.talent-card a:hover {
    opacity: 0.9;
}

.filters-sidebar button:hover,
.filters-sidebar a:hover {
    opacity: 0.9;
}

@media (max-width: 968px) {
    div[style*="grid-template-columns: 280px 1fr"] {
        grid-template-columns: 1fr !important;
    }
    
    .filters-sidebar {
        position: static !important;
    }
}
</style>
