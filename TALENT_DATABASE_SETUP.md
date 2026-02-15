# Talent Applications Database Setup ✅

## What Was Added

Your "Apply as a Talent" form is now fully connected to the database!

### Database Changes

**Updated `talent_applications` table** with all form fields:

| Field | Type | Description |
|-------|------|-------------|
| `id` | INT | Auto-increment primary key |
| `user_id` | INT | Link to registered user |
| `first_name` | VARCHAR(100) | First name |
| `middle_name` | VARCHAR(100) | Middle name |
| `last_name` | VARCHAR(100) | Last name |
| `age` | INT | Age (18-65) |
| `gender` | VARCHAR(20) | Gender (Male/Female) |
| `island` | VARCHAR(100) | Island group (Luzon, Visayas, Mindanao) |
| `region` | VARCHAR(100) | Region |
| `city` | VARCHAR(100) | City |
| `barangay` | VARCHAR(100) | Barangay |
| `street` | VARCHAR(200) | Street address |
| `skill` | VARCHAR(100) | Skill/Trade (Mason, Plumber, etc.) |
| `experience` | INT | Years of experience |
| `daily_rate` | DECIMAL(10,2) | Daily rate in PHP |
| `description` | LONGTEXT | Service description |
| `contact_number` | VARCHAR(20) | Contact phone number |
| `email` | VARCHAR(100) | Email address |
| `status` | VARCHAR(50) | Application status (pending, approved, rejected) |
| `created_at` | TIMESTAMP | Application date |
| `updated_at` | TIMESTAMP | Last update date |

### Files Modified/Created

✅ [database.sql](database.sql)
   - Updated `talent_applications` table structure

✅ [backend/apply-talent.php](backend/apply-talent.php)
   - New backend handler for form submission
   - Saves all talent data to database
   - Links to logged-in user (if available)

✅ [pages/apply-talent.php](pages/apply-talent.php)
   - Form now submits to `backend/apply-talent.php`
   - Client-side validation still in place
   - User data persists in database

✅ [test-db.php](test-db.php)
   - Updated to display all talent applications
   - Shows skill, experience, rate, and status

## How It Works

### Apply as Talent Flow:

1. User fills out talent application form
2. Form submits to `backend/apply-talent.php`
3. All form data validated
4. Data saved to `talent_applications` table
5. User linked by `user_id` if logged in
6. Success message displayed

### Form Fields Collected:

**Personal Information:**
- First name, middle name, last name
- Age (18-65 years)
- Gender (Male/Female)

**Address:**
- Island group (Luzon, Visayas, Mindanao)
- Region (dynamic based on island)
- City (dynamic based on region)
- Barangay (dynamic based on city)
- Street address

**Professional Information:**
- Skill/Trade (12 options: Mason, Plumber, Electrician, etc.)
- Years of experience
- Daily rate (optional, in PHP)
- Description of services

**Contact Information:**
- Contact number (required)
- Email address (optional)

## Testing

### Step 1: Update Database Structure
Run the updated `database.sql`:
1. Go to phpMyAdmin: `http://localhost/phpmyadmin`
2. Click on `hackathon` database
3. Click "Import" tab
4. Upload `database.sql` (or use "browse" to select it)
5. Click "Go" to import

**Note:** If you get a message about table already existing, that's fine - the new structure will be updated.

### Step 2: Test Application Submission
1. Go to: `http://localhost/eBayanPH/index.php?page=apply-talent`
2. Fill in all required fields
3. Select appropriate island → region → city → barangay
4. Click "Submit Application"
5. You should see success message

### Step 3: Verify Data Saved
1. Go to: `http://localhost/eBayanPH/test-db.php`
2. Scroll down to "Talent Applications" section
3. Your application should be listed there

## Database Fields Mapping

**Form input → Database field:**
- first_name → first_name
- middle_name → middle_name
- last_name → last_name
- age → age
- gender → gender
- island → island
- region → region
- city → city
- barangay → barangay
- street → street
- skill → skill
- experience → experience
- rate → daily_rate
- description → description
- contact → contact_number
- email → email

## Features

✅ All personal information saved
✅ Complete address details (island → region → city → barangay)
✅ Professional skills and experience tracked
✅ Daily rates stored
✅ Status tracking (pending, approved, rejected)
✅ Auto-linked to user if logged in
✅ Timestamps for creation and updates

## Next Steps

1. **Update existing database structure:**
   - Re-run database.sql import (it will update the table)

2. **Test talent application flow:**
   - Fill out and submit an application
   - Verify data appears in test-db.php

3. **Create admin view (optional):**
   - View all applications
   - Change status (pending → approved/rejected)
   - Contact talent applicants

4. **Create talent profile page:**
   - Show applicant's information publicly
   - Display in hire-talent listings

## SQL Query Examples

View all applications:
```sql
SELECT * FROM talent_applications ORDER BY created_at DESC;
```

View applications by skill:
```sql
SELECT * FROM talent_applications WHERE skill = 'Electrician';
```

View approved talent:
```sql
SELECT * FROM talent_applications WHERE status = 'approved';
```

Count applications by skill:
```sql
SELECT skill, COUNT(*) as count FROM talent_applications GROUP BY skill;
```

Everything is now set up! Test it out and let me know if you need additional features. 🎉
