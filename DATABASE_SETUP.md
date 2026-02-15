# eBayanPH Database Setup Guide

## Changes Made

Your eBayanPH project has been updated with the working database configuration from eBayan - Copy:

### Files Updated:
1. **includes/config.php** - Database connection configuration
2. **includes/includes.php** - Database connection backup
3. **backend/register.php** - User registration with improved security

### Key Changes:
- ✅ Database: Changed from `users` to `hackathon` database
- ✅ Port: Changed from 3307 to 3306 (standard MySQL port)
- ✅ Table: Changed to `ebayan` with correct column names
  - `dob` (instead of `birthday`)
  - `contact_num` (instead of `contact`)
- ✅ Security: Updated to use prepared statements (prevents SQL injection)
- ✅ Error Handling: Improved error messages

## Setup Instructions

### Step 1: Create the Database
1. Open **phpMyAdmin** (http://localhost/phpmyadmin)
2. Click on "New" to create a new database
3. Database name: `hackathon`
4. Click "Create"

### Step 2: Import the Database Schema
1. After creating the database, click on it
2. Click on the "Import" tab
3. Choose the file: `database.sql` (included in your project root)
4. Click "Go" or "Import"

This will create:
- `ebayan` table - for user registration
- `announcements`, `services`, `complaints` tables - for content management
- `barangay_clearance_applications` table
- `talent_applications` table

### Step 3: Verify Connection
1. Start XAMPP (Apache + MySQL)
2. Make sure MySQL is running on port **3306**
3. Access your application: `http://localhost/eBayanPH/`
4. Test the registration page to verify database connection

## Database Configuration

All your files now use:
- **Host**: localhost
- **User**: root
- **Password**: (empty)
- **Database**: hackathon
- **Port**: 3306

## Important Notes

⚠️ **For Production**:
- Change the default MySQL password
- Use a proper database user account (not 'root')
- Enable SSL/TLS for database connections
- Implement proper input validation

✨ **Security Improvements Made**:
- Switched from direct SQL queries to prepared statements
- Added password hashing with `PASSWORD_DEFAULT`
- Improved error handling

## Next Steps

1. Run the `database.sql` import
2. Test user registration
3. Verify that user data is being saved correctly
4. Update other pages that interact with the database

Enjoy your working database! 🎉
