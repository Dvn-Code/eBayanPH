<div class="breadcrumb">
    <a href="?page=home">Home</a>
    <span>›</span>
    <span>Complaints</span>
</div>

<div class="main-content">
    <div class="section">
        <h2 class="section-title">File a Complaint</h2>
        <div class="section-content">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="complaintName">Full Name</label>
                    <input type="text" id="complaintName" name="name" required placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label for="complaintEmail">Email Address</label>
                    <input type="email" id="complaintEmail" name="email" required placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="complaintSubject">Subject</label>
                    <input type="text" id="complaintSubject" name="subject" required placeholder="Brief description of your complaint">
                </div>
                <div class="form-group">
                    <label for="complaintDetails">Details</label>
                    <textarea id="complaintDetails" name="details" rows="6" placeholder="Provide detailed information about your complaint"></textarea>
                </div>
                <button type="submit" name="submit_complaint" class="btn btn-primary" style="width: auto; padding: 0.875rem 2rem;">Submit Complaint</button>
            </form>
        </div>
    </div>
</div>