# JobDock - Feature Roadmap & Checklist

This document serves as our project roadmap. We will use this checklist to implement advanced features one by one to make JobDock premium and fully featured for both Job Seekers (Employees) and Employers (Companies).

---

## 🗺️ Feature Checklist

### 1. 🟢 Application Status Tracking & Side Panel View
*Allows employers to view, update, and manage applicants in a compact table and right-to-left slide-over panel layout.*
*   **Target User:** Both (Employees & Companies)
*   **Priority:** High
*   **Status:** `[x] Completed`
*   **Implementation Details:**
    *   Added `status` column to the `applicants` table.
    *   Redesigned the dashboard to render a responsive `<table>` layout for job applications.
    *   Implemented Alpine.js powered right-to-left slide-over drawer panels displaying details and resume view links.
    *   Set up status update form submits inside the drawer panel, integrating session-based active drawer persistence on reload.

---

### 2. 🟢 Default Profile Resume Manager
*Allows employees to save a resume to their profile and reuse it instantly when applying to new jobs.*
*   **Target User:** Employees (Job Seekers)
*   **Priority:** Medium-High
*   **Status:** `[ ] Not Started`
*   **Implementation Steps:**
    *   Add a `resume_path` string column to the `users` table.
    *   Update the **My Profile** settings form on the dashboard to allow uploading and deleting a profile resume.
    *   In the **Job Apply** form, check if a profile resume exists. If yes, show a "Use Saved Resume" checkbox alongside the file upload input.

---

### 3. 🟢 Advanced Search & Job Filters
*Enhances the job search page with filters for types, salary, and active tags.*
*   **Target User:** Employees (Job Seekers)
*   **Priority:** Medium
*   **Status:** `[ ] Not Started`
*   **Implementation Steps:**
    *   Add sidebar filter components on the `/jobs` page:
        *   Checkbox list for Job Types (`Full-time`, `Part-time`, `Contract`, `Internship`, `Remote`).
        *   Minimum Salary numeric filter/slider.
    *   Update `JobController@search` logic to dynamically apply these filters to the database query.

---

### 4. 🟢 Company Public Profiles
*Creates dedicated profile pages for companies to showcase all their job listings.*
*   **Target User:** Both (Companies & Employees)
*   **Priority:** Medium
*   **Status:** `[ ] Not Started`
*   **Implementation Steps:**
    *   Create a company profile view route (e.g., `/companies/{company_name}`).
    *   Design a dedicated page layout with the company logo, banner, bio, website link, and a list of all active jobs posted by that company.
    *   Make the company name clickable on all job listing cards/pages.

---

### 5. 🟢 Employer Action Center (Notes & Direct Emailing)
*Enables employers to add private evaluation notes on applicants and email them directly.*
*   **Target User:** Companies (Employers)
*   **Priority:** Low-Medium
*   **Status:** `[ ] Not Started`
*   **Implementation Steps:**
    *   Create an `applicant_notes` text column on the `applicants` table to store private company ratings.
    *   Create a simple text input overlay on the dashboard for employers to save/edit notes.
    *   Configure a mail template to send email updates (e.g., interview invites) to the applicant directly from the dashboard.

---

### 6. 🟢 Job Listing Status & Expiration Dates
*Allows companies to toggle job post states (Active, Draft, Closed).*
*   **Target User:** Companies (Employers)
*   **Priority:** Medium
*   **Status:** `[ ] Not Started`
*   **Implementation Steps:**
    *   Add a `status` column (`'active'`, `'draft'`, `'closed'`) to the `job_listings` table.
    *   Update `JobController@index` and search queries to only return `'active'` jobs to the public.
    *   Add toggle controls for status on the Employer Dashboard and Job Creation form.
