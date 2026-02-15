<?php
// Handle SOS button submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_sos'])) {
    // Store SOS request (in production, save to database and send SMS/notifications)
    $_SESSION['sos_request'] = [
        'user_name' => $currentUser['first_name'] . ' ' . $currentUser['last_name'],
        'user_contact' => $currentUser['contact'],
        'user_address' => $currentUser['house_num'] . ' ' . $currentUser['street'] . ', ' . $currentUser['barangay'] . ', ' . $currentUser['city'],
        'emergency_type' => $_POST['emergency_type'],
        'message' => $_POST['message'],
        'timestamp' => date('Y-m-d H:i:s'),
        'reference_number' => 'SOS-' . date('Ymd') . '-' . rand(1000, 9999)
    ];
    
    header('Location: index.php?page=emergency-services&sos=sent');
    exit();
}
?>

<div class="container" style="padding: 2rem 1rem; max-width: 1200px; margin: 0 auto;">
    <!-- Breadcrumb -->
    <div class="breadcrumb" style="margin-bottom: 2rem; color: #5A6C7D; font-size: 0.9rem;">
        <a href="?page=home" style="color: #0A3A6E; text-decoration: none;">Home</a>
        <span style="margin: 0 0.5rem;">›</span>
        <a href="?page=pardo" style="color: #0A3A6E; text-decoration: none;">Barangay Pardo</a>
        <span style="margin: 0 0.5rem;">›</span>
        <span>Emergency Services</span>
    </div>

    <!-- Header -->
    <div class="page-header" style="text-align: center; margin-bottom: 3rem; background: linear-gradient(135deg, #C8102E 0%, #E02040 100%); color: white; padding: 3rem 2rem; border-radius: 16px; box-shadow: 0 4px 12px rgba(200, 16, 46, 0.3);">
        <div style="font-size: 4rem; margin-bottom: 1rem;">🚨</div>
        <h1 style="font-size: 2.5rem; margin-bottom: 0.5rem;">Emergency Services</h1>
        <p style="font-size: 1.1rem; opacity: 0.95;">24/7 Emergency Response - Barangay Pardo</p>
    </div>

    <!-- Emergency Contacts Grid -->
    <h2 style="color: #0A3A6E; font-size: 2rem; margin-bottom: 2rem; text-align: center;">📞 Emergency Hotlines</h2>
    
    <div class="emergency-grid">

        <!-- Police -->
        <div style="background: white; padding: 2.5rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-left: 5px solid #0A3A6E;">
            <div style="text-align: center; margin-bottom: 1.5rem;">
                <div style="font-size: 4rem; margin-bottom: 1rem;">👮</div>
                <h3 style="color: #0A3A6E; font-size: 1.5rem; margin-bottom: 0.5rem;">Philippine National Police</h3>
                <p style="color: #5A6C7D; font-size: 0.9rem;">Pardo Police Station</p>
            </div>
            
            <div style="background: #F0F7FF; padding: 1.5rem; border-radius: 8px; margin-bottom: 1rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
                    <span style="color: #5A6C7D; font-size: 0.9rem;">📞 Emergency Hotline:</span>
                    <a href="tel:911" style="color: #C8102E; font-size: 1.5rem; font-weight: 700; text-decoration: none;">911</a>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
                    <span style="color: #5A6C7D; font-size: 0.9rem;">📞 Station Direct:</span>
                    <a href="tel:+63322540123" style="color: #0A3A6E; font-weight: 600; text-decoration: none;">+63 32 254-0123</a>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: #5A6C7D; font-size: 0.9rem;">📍 Location:</span>
                    <span style="color: #1A2332; font-weight: 600; font-size: 0.9rem;">Pardo, Cebu City</span>
                </div>
            </div>

            <div style="display: flex; gap: 0.75rem;">
                <a href="tel:911" style="flex: 1; padding: 0.875rem; background: #C8102E; color: white; text-align: center; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.95rem;">
                    📞 Call 911
                </a>
                <a href="tel:+63322540123" style="flex: 1; padding: 0.875rem; background: #0A3A6E; color: white; text-align: center; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.95rem;">
                    📞 Call Station
                </a>
            </div>
        </div>

        <!-- BFP (Bureau of Fire Protection) -->
        <div style="background: white; padding: 2.5rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-left: 5px solid #E02040;">
            <div style="text-align: center; margin-bottom: 1.5rem;">
                <div style="font-size: 4rem; margin-bottom: 1rem;">🚒</div>
                <h3 style="color: #C8102E; font-size: 1.5rem; margin-bottom: 0.5rem;">Bureau of Fire Protection</h3>
                <p style="color: #5A6C7D; font-size: 0.9rem;">Cebu City Fire Station</p>
            </div>
            
            <div style="background: #FFF5F5; padding: 1.5rem; border-radius: 8px; margin-bottom: 1rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
                    <span style="color: #5A6C7D; font-size: 0.9rem;">🔥 Fire Emergency:</span>
                    <a href="tel:911" style="color: #C8102E; font-size: 1.5rem; font-weight: 700; text-decoration: none;">911</a>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
                    <span style="color: #5A6C7D; font-size: 0.9rem;">📞 BFP Cebu City:</span>
                    <a href="tel:+63322560234" style="color: #C8102E; font-weight: 600; text-decoration: none;">+63 32 256-0234</a>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: #5A6C7D; font-size: 0.9rem;">📍 Response Area:</span>
                    <span style="color: #1A2332; font-weight: 600; font-size: 0.9rem;">Cebu City</span>
                </div>
            </div>

            <div style="display: flex; gap: 0.75rem;">
                <a href="tel:911" style="flex: 1; padding: 0.875rem; background: #C8102E; color: white; text-align: center; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.95rem;">
                    🔥 Call 911
                </a>
                <a href="tel:+63322560234" style="flex: 1; padding: 0.875rem; background: #E02040; color: white; text-align: center; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.95rem;">
                    📞 Call BFP
                </a>
            </div>
        </div>

        <!-- Barangay Tanod -->
        <div style="background: white; padding: 2.5rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-left: 5px solid #FDB913;">
            <div style="text-align: center; margin-bottom: 1.5rem;">
                <div style="font-size: 4rem; margin-bottom: 1rem;">🛡️</div>
                <h3 style="color: #1A2332; font-size: 1.5rem; margin-bottom: 0.5rem;">Barangay Tanod</h3>
                <p style="color: #5A6C7D; font-size: 0.9rem;">Barangay Pardo Security</p>
            </div>
            
            <div style="background: #FFF9E6; padding: 1.5rem; border-radius: 8px; margin-bottom: 1rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
                    <span style="color: #5A6C7D; font-size: 0.9rem;">📞 Tanod Hotline:</span>
                    <a href="tel:+63321234567" style="color: #1A2332; font-size: 1.3rem; font-weight: 700; text-decoration: none;">+63 32 123-4567</a>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
                    <span style="color: #5A6C7D; font-size: 0.9rem;">📞 Mobile:</span>
                    <a href="tel:+639123456789" style="color: #1A2332; font-weight: 600; text-decoration: none;">+63 912 345 6789</a>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: #5A6C7D; font-size: 0.9rem;">📍 Coverage:</span>
                    <span style="color: #1A2332; font-weight: 600; font-size: 0.9rem;">Barangay Pardo</span>
                </div>
            </div>

            <div style="display: flex; gap: 0.75rem;">
                <a href="tel:+63321234567" style="flex: 1; padding: 0.875rem; background: #FDB913; color: #1A2332; text-align: center; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.95rem;">
                    📞 Call Hotline
                </a>
                <a href="tel:+639123456789" style="flex: 1; padding: 0.875rem; background: #1A2332; color: white; text-align: center; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.95rem;">
                    📱 Call Mobile
                </a>
            </div>
        </div>
    </div>

    <!-- Other Emergency Numbers -->
    <div style="background: #F0F7FF; padding: 2rem; border-radius: 12px; border-left: 4px solid #0A3A6E;">
        <h3 style="color: #0A3A6E; font-size: 1.5rem; margin-bottom: 1.5rem;">📋 Other Important Numbers</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
            <div style="background: white; padding: 1rem; border-radius: 8px;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: #5A6C7D; font-weight: 600;">🏥 Emergency Medical (Red Cross):</span>
                    <a href="tel:143" style="color: #C8102E; font-weight: 700; text-decoration: none; font-size: 1.1rem;">143</a>
                </div>
            </div>
            <div style="background: white; padding: 1rem; border-radius: 8px;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: #5A6C7D; font-weight: 600;">🚑 ERUF (Emergency Response):</span>
                    <a href="tel:+63322300021" style="color: #C8102E; font-weight: 700; text-decoration: none; font-size: 1.1rem;">254-0021</a>
                </div>
            </div>
            <div style="background: white; padding: 1rem; border-radius: 8px;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: #5A6C7D; font-weight: 600;">⚡ Coast Guard:</span>
                    <a href="tel:+63322332371" style="color: #0A3A6E; font-weight: 700; text-decoration: none; font-size: 1.1rem;">233-2371</a>
                </div>
            </div>
            <div style="background: white; padding: 1rem; border-radius: 8px;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: #5A6C7D; font-weight: 600;">☎️ PLDT Directory:</span>
                    <a href="tel:187" style="color: #0A3A6E; font-weight: 700; text-decoration: none; font-size: 1.1rem;">187</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SOS Modal -->
<div id="sosModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 9999; align-items: center; justify-content: center;">
    <div style="background: white; padding: 2.5rem; border-radius: 16px; max-width: 500px; width: 90%; box-shadow: 0 8px 24px rgba(0,0,0,0.3);">
        <div style="text-align: center; margin-bottom: 2rem;">
            <div style="font-size: 4rem; margin-bottom: 1rem; animation: pulse 1s infinite;">🚨</div>
            <h2 style="color: #C8102E; font-size: 2rem; margin-bottom: 0.5rem;">Send SOS Alert</h2>
            <p style="color: #5A6C7D;">This will immediately notify emergency responders</p>
        </div>

        <form method="POST" action="">
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                    Emergency Type <span style="color: #C8102E;">*</span>
                </label>
                <select name="emergency_type" required style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem; background: white;">
                    <option value="">Select Emergency Type</option>
                    <option value="Medical Emergency">🏥 Medical Emergency</option>
                    <option value="Fire">🔥 Fire</option>
                    <option value="Crime/Violence">👮 Crime/Violence</option>
                    <option value="Accident">🚗 Accident</option>
                    <option value="Natural Disaster">🌊 Natural Disaster</option>
                    <option value="Other">⚠️ Other</option>
                </select>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                    Additional Information (Optional)
                </label>
                <textarea name="message" rows="3" placeholder="Describe the emergency situation..."
                    style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem; resize: vertical;"></textarea>
            </div>

            <div style="background: #FFF5F5; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                <p style="color: #5A6C7D; font-size: 0.9rem; margin: 0; line-height: 1.6;">
                    📍 Your location will be automatically sent:<br>
                    <strong><?= $currentUser['house_num'] . ' ' . $currentUser['street'] . ', ' . $currentUser['barangay'] . ', ' . $currentUser['city'] ?></strong>
                </p>
            </div>

            <div style="display: flex; gap: 1rem;">
                <button type="button" onclick="closeSOSModal()" style="flex: 1; padding: 1rem; background: #E1E8ED; color: #1A2332; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; font-size: 1rem;">
                    Cancel
                </button>
                <button type="submit" name="send_sos" style="flex: 1; padding: 1rem; background: #C8102E; color: white; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; font-size: 1rem;">
                    🆘 Send Alert
                </button>
            </div>
        </form>
    </div>
</div>

<!-- SOS Success Modal -->
<?php if (isset($_GET['sos']) && $_GET['sos'] === 'sent'): ?>
<div id="sosSuccessModal" style="display: flex; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 9999; align-items: center; justify-content: center;">
    <div style="background: white; padding: 3rem; border-radius: 16px; max-width: 500px; width: 90%; text-align: center; box-shadow: 0 8px 24px rgba(0,0,0,0.3);">
        <div style="font-size: 5rem; margin-bottom: 1rem; animation: bounce 1s;">✅</div>
        <h2 style="color: #28A745; font-size: 2rem; margin-bottom: 1rem;">SOS Alert Received!</h2>
        <div style="background: #F0F7FF; padding: 1.5rem; border-radius: 8px; margin-bottom: 1.5rem;">
            <p style="color: #5A6C7D; margin-bottom: 0.5rem;">Reference Number:</p>
            <p style="color: #0A3A6E; font-size: 1.5rem; font-weight: 700; margin: 0; letter-spacing: 2px;"><?= $_SESSION['sos_request']['reference_number'] ?></p>
        </div>
        <p style="color: #5A6C7D; margin-bottom: 1.5rem; line-height: 1.6;">
            Emergency responders have been notified and are on their way to your location. Please stay calm and wait for assistance.
        </p>
        <div style="background: #FFF5F5; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            <p style="color: #C8102E; font-weight: 600; margin: 0;">⚠️ Please keep your phone accessible</p>
        </div>
        <button onclick="closeSuccessModal()" style="padding: 1rem 2rem; background: #0A3A6E; color: white; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; font-size: 1rem;">
            Close
        </button>
    </div>
</div>
<?php endif; ?>

<style>
@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

button:hover {
    opacity: 0.9;
    transform: translateY(-2px);
}

a:hover {
    opacity: 0.8;
}
</style>

<script>
function openSOSModal() {
    document.getElementById('sosModal').style.display = 'flex';
}

function closeSOSModal() {
    document.getElementById('sosModal').style.display = 'none';
}

function closeSuccessModal() {
    document.getElementById('sosSuccessModal').style.display = 'none';
    window.location.href = '?page=emergency-services';
}

// Close modal when clicking outside
window.onclick = function(event) {
    const sosModal = document.getElementById('sosModal');
    if (event.target == sosModal) {
        closeSOSModal();
    }
}
</script>
