# eBayan - Government Portal (Version 2 - Enhanced)

A comprehensive government portal website built with PHP featuring enhanced authentication, Philippine location system, improved UI/UX, and multi-level navigation.

## 🆕 Version 2 Improvements

### 1. **Enhanced Signup Form** ✨
- **Wider Layout**: Improved form layout with better space utilization (not compressed)
- **Philippine Location System**:
  - 3 Major Island Groups (Luzon, Visayas, Mindanao)
  - Cascading dropdowns: Island → Region → City → Barangay
  - Only shows regions/cities relevant to selected island
  - Comprehensive list of Philippine cities and barangays
- **Age Validation**: Must be 18 years or older
- **Contact with Country Code**: +63 prefix (Philippine calling code)
- **Real-time Validation**: Red highlight for missing fields
- **Terms Popup**: Click to view terms in a modal popup (not redirect)
- **Optional House Number**: Not required field

### 2. **Fixed Verification Popup** ✅
- **Perfect Button Alignment**: Buttons now properly aligned using flexbox
- Professional layout with centered buttons

### 3. **Improved Admin Subscription** 🏛️
- **Location Dropdowns**: 
  - Island Group → Region → City → Barangay
  - Smart cascading selection
  - Philippine calling code +63 for contact numbers
- **Barangay Selection**: Dropdown list of barangays (not text input)
- **Streamlined Address**: Island, City, Barangay, Street, House# (optional)

### 4. **Redesigned Navigation** 🗺️
- **Removed Complaints from Main**: Cleaner main navigation
- **New "Area" Dropdown**:
  - Hover over "Area" to see Cebu City
  - Hover over "Cebu City" to see Pardo (nested dropdown)
  - Smooth multi-level navigation
- Navigation structure: Home → Announcements → Services → Area

### 5. **Enhanced Profile Page** 👤
- **Edit/Save Toggle**:
  - Click "Edit Profile" to enable editing
  - All fields become editable (except email, barangay, city)
  - Button changes to "Cancel" (red)
  - "Save Changes" button appears
  - Click "Cancel" to reset changes
  - After save, fields are locked again
- **Smart Field Locking**: Email, Barangay, and City are always locked for data integrity

## 📦 Complete Features

### Authentication System
- ✅ Detailed signup with validation
- ✅ Birthday validation (18+ only)
- ✅ Philippine location cascading dropdowns
- ✅ Real-time form validation with red highlights
- ✅ Contact number with +63 country code
- ✅ Google Sign-In integration
- ✅ Terms popup modal
- ✅ Account verification system

### User Interface
- ✅ Wide, spacious signup form
- ✅ Responsive design
- ✅ Smooth animations
- ✅ Nested dropdown menus
- ✅ Professional color scheme
- ✅ Accessible navigation

### Profile Management
- ✅ View profile information
- ✅ Edit/Save toggle system
- ✅ Field locking after save
- ✅ Verification status display
- ✅ One-click verification

### Admin Features
- ✅ Admin subscription with perks
- ✅ Philippine location dropdowns
- ✅ File upload system
- ✅ Document validation
- ✅ Application tracking

### Navigation System
- ✅ Home, Announcements, Services
- ✅ Area dropdown (multi-level)
- ✅ Cebu City → Pardo nested navigation
- ✅ Breadcrumb trails
- ✅ Back buttons for easy navigation

## 🗂️ File Structure

```
ebayan-v2/
├── index.php                    # Enhanced routing with verification
├── assets/
│   └── css/
│       └── styles.php          # Updated CSS with nested dropdown styles
├── includes/
│   ├── navbar.php              # Redesigned navbar with Area dropdown
│   └── footer.php              # Footer component
├── pages/
│   ├── login.php               # Login page
│   ├── signup.php              # Enhanced signup with Philippine locations ⭐
│   ├── profile.php             # Profile with edit/save toggle ⭐
│   ├── admin-subscribe.php     # Improved admin form ⭐
│   ├── home.php                # Home with subscription section
│   ├── announcements.php       # Announcements
│   ├── services.php            # Services  
│   ├── settings.php            # Password & terms
│   ├── faq.php                 # FAQ page
│   ├── about.php               # About eBayan
│   ├── cebu-city.php           # Cebu City pages
│   ├── cebu-announcements.php
│   ├── cebu-services.php
│   ├── cebu-complaints.php
│   ├── pardo.php               # Pardo pages
│   ├── pardo-announcements.php
│   ├── pardo-services.php
│   ├── pardo-complaints.php
│   └── pardo-officials.php
└── README.md                    # This file
```

## 🚀 Installation

### Requirements
- PHP 7.4 or higher
- Web server (Apache, Nginx, or PHP built-in)

### Setup Steps

1. **Extract files** to web server directory:
   - XAMPP: `C:/xampp/htdocs/eBayanPH/`
   - WAMP: `C:/wamp64/www/eBayanPH/`
   - MAMP: `/Applications/MAMP/htdocs/eBayanPH/`

2. **Start web server**:
   - XAMPP/WAMP: Start Apache
   - PHP Built-in: `php -S localhost:8000`

3. **Access**: `http://localhost/eBayanPH/`

## 📱 User Guide

### Signing Up

1. Click "Sign Up"
2. Fill in personal information:
   - Full name (First, Middle, Last)
   - Birthday (must be 18+)
   - Gender
   - Contact (+63 XXXXXXXXXX)
   - Email

3. Select address:
   - Choose Island Group (Luzon/Visayas/Mindanao)
   - Select your Region (filtered by island)
   - Choose your City (filtered by region)
   - Pick your Barangay (filtered by city)
   - Enter Street name
   - House number (optional)

4. Create password
5. Click "Terms and Conditions" to view in popup
6. Agree and create account

**Validation**:
- Missing fields turn RED
- Age under 18 = blocked
- Passwords must match
- All required fields must be filled

### Using Navigation

**Main Portal**:
- Home → Announcements → Services → Area

**Area Dropdown**:
1. Hover over "Area"
2. See "Cebu City"
3. Hover over "Cebu City"
4. See "Pardo" appear
5. Click to navigate

**Within Areas**:
- Cebu City has: Home, Barangay, Announcements, Services, Complaints
- Pardo has: Home, Announcements, Services, Complaints, Officials

### Managing Profile

1. Click avatar (top-right) → "User Profile"
2. View your information
3. Click "✏️ Edit Profile"
4. All fields become editable (except email, barangay, city)
5. Make changes
6. Click "💾 Save Changes"
7. Fields lock automatically

**To Cancel**:
- Click "❌ Cancel" (red button)
- Changes are discarded
- Fields lock again

### Admin Subscription

1. Scroll to bottom of home page
2. Click "Subscribe Now"
3. Fill application form:
   - Select Island → Region → City → Barangay
   - Enter office address
   - Provide contact (+63 XXXXXXXXXX)
   - Barangay Captain info
   - Upload documents:
     - Authorization letter
     - Barangay certificate
     - Valid ID
     - Additional docs (optional)
4. Agree to terms
5. Submit application

## 🗺️ Philippine Locations

### Supported Regions

**Luzon**:
- NCR, CAR, Region I-V

**Visayas**:
- Region VI-VIII

**Mindanao**:
- Region IX-XIII, BARMM

### Major Cities Included
- Metro Manila cities
- Cebu City, Mandaue, Lapu-Lapu
- Davao City, Cagayan de Oro
- And many more...

## ⚙️ Key Features Explained

### Cascading Dropdowns
- Intelligent filtering based on previous selection
- No irrelevant options shown
- Smooth user experience

### Form Validation
- Real-time red highlighting
- Age verification (18+)
- Contact number format
- Password matching
- File size limits (5MB)

### Edit/Save System
- Single button toggle
- Visual feedback (button color change)
- Auto-lock after save
- Cancel option available
- Protected fields (email, location)

### Nested Menus
- Multi-level navigation
- Hover-activated
- Smooth transitions
- Professional appearance

## 🔒 Security Notes

**For Production**:
1. Implement database integration
2. Use password hashing
3. Add CSRF protection
4. Validate file uploads
5. Enable HTTPS
6. Implement rate limiting
7. Add email verification

## 🎨 Customization

### Colors
Edit `/assets/css/styles.php`:
```css
:root {
    --primary: #0A3A6E;
    --secondary: #C8102E;
    --accent: #FDB913;
}
```

### Adding Locations
Edit dropdown functions in:
- `pages/signup.php`
- `pages/admin-subscribe.php`

Add to `philippineData` object.

## 🐛 Troubleshooting

**Signup form too narrow?**
- Check browser width
- Form adapts on mobile

**Dropdowns not working?**
- Enable JavaScript
- Check console for errors

**Can't edit profile?**
- Click "Edit Profile" button first
- Check if logged in

**Nested menus not appearing?**
- Hover carefully
- Wait for transition

## 📞 Support

- Email: support@ebayan.gov.ph
- Hotline: 1-800-EBAYAN
- Use complaints system

## 📝 Version History

### Version 2.0 (Current)
- Wide signup form
- Philippine location system
- Age validation (18+)
- +63 country code
- Terms popup
- Fixed verification popup buttons
- Area dropdown with nesting
- Edit/Save profile toggle
- Admin location dropdowns

### Version 1.0
- Initial release
- Basic authentication
- Profile system
- Admin subscription

---

**© 2026 Republic of the Philippines - eBayan Portal**  
All Rights Reserved

**Built with**: PHP, HTML5, CSS3, JavaScript  
**No external frameworks** - Pure, lightweight code!