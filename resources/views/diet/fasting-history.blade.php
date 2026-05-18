@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-black mb-1">Fasting History</h1>
                    <p class="text-muted mb-0">Complete record of your fasting journey</p>
                </div>
                <div>
                    <button class="btn btn-outline-primary rounded-pill" onclick="history.back()">
                        <i class="fas fa-arrow-left me-2"></i>Back to Tracker
                    </button>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="row g-4 mb-5">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-fire text-danger fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">47</h3>
                            <p class="text-muted mb-0">Total Fasts</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-clock text-primary fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">16.5h</h3>
                            <p class="text-muted mb-0">Avg Duration</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-trophy text-success fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">21</h3>
                            <p class="text-muted mb-0">Day Streak</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-chart-line text-warning fs-2 mb-3"></i>
                            <h3 class="fw-black mb-1">89%</h3>
                            <p class="text-muted mb-0">Success Rate</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- History Table -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-0 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-black mb-0">Fasting Log</h5>
                        <div class="d-flex gap-2">
                            <div class="dropdown">
                                <button class="btn btn-outline-primary rounded-pill dropdown-toggle" data-bs-toggle="dropdown" id="filterDropdown">
                                    <i class="fas fa-calendar me-2"></i><span id="currentFilter">Last 30 Days</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="filterHistory(7, 'Last 7 Days')">Last 7 Days</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="filterHistory(30, 'Last 30 Days')">Last 30 Days</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="filterHistory(90, 'Last 90 Days')">Last 90 Days</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="filterHistory(0, 'All Time')">All Time</a></li>
                                </ul>
                            </div>
                            <button class="btn btn-primary rounded-pill" onclick="exportHistory()">
                                <i class="fas fa-download me-2"></i>Export
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>May 24, 2024</strong></td>
                                    <td><span class="badge bg-primary rounded-pill">Intermittent</span></td>
                                    <td>8:00 PM</td>
                                    <td>12:00 PM</td>
                                    <td>16 hours</td>
                                    <td><span class="badge bg-success rounded-pill">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary rounded-pill">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>May 23, 2024</strong></td>
                                    <td><span class="badge bg-primary rounded-pill">Intermittent</span></td>
                                    <td>8:00 PM</td>
                                    <td>12:00 PM</td>
                                    <td>16 hours</td>
                                    <td><span class="badge bg-success rounded-pill">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary rounded-pill">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>May 22, 2024</strong></td>
                                    <td><span class="badge bg-warning rounded-pill">Extended</span></td>
                                    <td>6:00 PM</td>
                                    <td>2:00 PM</td>
                                    <td>20 hours</td>
                                    <td><span class="badge bg-success rounded-pill">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary rounded-pill">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>May 21, 2024</strong></td>
                                    <td><span class="badge bg-primary rounded-pill">Intermittent</span></td>
                                    <td>8:00 PM</td>
                                    <td>11:30 AM</td>
                                    <td>15.5 hours</td>
                                    <td><span class="badge bg-warning rounded-pill">Early Break</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary rounded-pill">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>May 20, 2024</strong></td>
                                    <td><span class="badge bg-primary rounded-pill">Intermittent</span></td>
                                    <td>8:00 PM</td>
                                    <td>12:00 PM</td>
                                    <td>16 hours</td>
                                    <td><span class="badge bg-success rounded-pill">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary rounded-pill">View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.fw-black { font-weight: 900; }
</style>

@section('scripts')
<script>
    const allFastingData = [
        { date: '2024-05-24', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
        { date: '2024-05-23', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
        { date: '2024-05-22', type: 'Extended', startTime: '6:00 PM', endTime: '2:00 PM', duration: '20 hours', status: 'Completed' },
        { date: '2024-05-21', type: 'Intermittent', startTime: '8:00 PM', endTime: '11:30 AM', duration: '15.5 hours', status: 'Early Break' },
        { date: '2024-05-20', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
        { date: '2024-05-19', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
        { date: '2024-05-18', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
        { date: '2024-05-17', type: 'Extended', startTime: '7:00 PM', endTime: '3:00 PM', duration: '20 hours', status: 'Completed' },
        { date: '2024-05-16', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
        { date: '2024-05-15', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
        { date: '2024-04-15', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
        { date: '2024-03-15', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
        { date: '2024-02-15', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' },
        { date: '2024-01-15', type: 'Intermittent', startTime: '8:00 PM', endTime: '12:00 PM', duration: '16 hours', status: 'Completed' }
    ];

    function filterHistory(days, label) {
        // Use a fixed current date for consistent filtering (2024-05-24)
        const currentDate = new Date('2024-05-24');
        const filteredData = days === 0 ? allFastingData : allFastingData.filter(fast => {
            const fastDate = new Date(fast.date);
            const daysDiff = Math.floor((currentDate - fastDate) / (1000 * 60 * 60 * 24));
            return daysDiff <= days;
        });

        updateHistoryTable(filteredData);
        document.getElementById('currentFilter').textContent = label;
        
        // Update stats based on filtered data
        updateStats(filteredData);
        
        // Show feedback about filtering
        console.log(`Filter: ${label}, Showing ${filteredData.length} of ${allFastingData.length} records`);
        
        // Show visual feedback
        showFilterFeedback(label, filteredData.length);
    }
    
    function showFilterFeedback(label, count) {
        // Remove any existing feedback
        const existingFeedback = document.querySelector('.filter-feedback');
        if (existingFeedback) {
            existingFeedback.remove();
        }
        
        // Create feedback message
        const feedback = document.createElement('div');
        feedback.className = 'alert alert-info alert-dismissible fade show rounded-4 filter-feedback';
        feedback.innerHTML = `
            <strong>Filter Applied:</strong> ${label} - Showing ${count} records
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        // Insert after the header
        const header = document.querySelector('.d-flex.justify-content-between.align-items-center');
        if (header) {
            header.parentNode.insertBefore(feedback, header.nextSibling);
        }
        
        // Auto-remove after 2 seconds
        setTimeout(() => {
            if (feedback.parentNode) {
                feedback.remove();
            }
        }, 2000);
    }

    function updateHistoryTable(data) {
        const tbody = document.querySelector('tbody');
        if (tbody) {
            tbody.innerHTML = '';
            data.forEach((fast, index) => {
                // Calculate actual duration from start and end times
                const calculatedDuration = calculateDuration(fast.startTime, fast.endTime);
                
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><strong>${fast.date}</strong></td>
                    <td><span class="badge bg-primary rounded-pill">${fast.type}</span></td>
                    <td>${fast.startTime}</td>
                    <td>${fast.endTime}</td>
                    <td>${calculatedDuration}</td>
                    <td><span class="badge ${fast.status === 'Completed' ? 'bg-success' : 'bg-warning'} rounded-pill">${fast.status}</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary rounded-pill" onclick="viewFastDetails(${index})">View</button>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }
    }
    
    // Add the calculateDuration function to this page
    function calculateDuration(startTime, endTime) {
        // Proper time calculation handling AM/PM
        const parseTime = (timeStr) => {
            const time = timeStr.trim().toLowerCase();
            let hours, minutes = 0;
            
            if (time.includes('am') || time.includes('pm')) {
                const parts = time.replace(/[ap]m/g, '').split(':');
                hours = parseInt(parts[0]);
                if (parts.length > 1) minutes = parseInt(parts[1]);
                
                if (time.includes('pm') && hours !== 12) hours += 12;
                if (time.includes('am') && hours === 12) hours = 0;
            } else {
                // 24-hour format
                const parts = time.split(':');
                hours = parseInt(parts[0]);
                if (parts.length > 1) minutes = parseInt(parts[1]);
            }
            
            return hours * 60 + minutes;
        };
        
        const startMinutes = parseTime(startTime);
        let endMinutes = parseTime(endTime);
        
        // Handle overnight fasting (end time is next day)
        if (endMinutes <= startMinutes) {
            endMinutes += 24 * 60; // Add 24 hours
        }
        
        const durationMinutes = endMinutes - startMinutes;
        const hours = Math.floor(durationMinutes / 60);
        const minutes = durationMinutes % 60;
        
        if (minutes === 0) {
            return `${hours} hours`;
        } else {
            return `${hours}.${Math.round(minutes/6)} hours`;
        }
    }

    function updateStats(data) {
        const totalFasts = data.length;
        const avgDuration = data.length > 0 ? '16.5' : '0';
        const completedFasts = data.filter(f => f.status === 'Completed').length;
        const successRate = totalFasts > 0 ? Math.round((completedFasts / totalFasts) * 100) : 0;

        // Update stat cards
        const statElements = document.querySelectorAll('.card-body h3');
        if (statElements[0]) statElements[0].textContent = totalFasts;
        if (statElements[1]) statElements[1].textContent = avgDuration + 'h';
        if (statElements[2]) statElements[2].textContent = successRate + '%';
    }

    function viewFastDetails(index) {
        const fast = allFastingData[index];
        alert(`Fast Details:\n\nDate: ${fast.date}\nType: ${fast.type}\nStart: ${fast.startTime}\nEnd: ${fast.endTime}\nDuration: ${fast.duration}\nStatus: ${fast.status}`);
    }

    function exportHistory() {
        let readableText = 'FASTING HISTORY REPORT\n';
        readableText += '=====================\n\n';
        readableText += `Report Date: ${new Date().toLocaleDateString()}\n`;
        readableText += 'SUMMARY:\n';
        readableText += '--------\n';
        readableText += `Total Fasts: ${allFastingData.length}\n`;
        readableText += 'Average Duration: 16.5 hours\n';
        readableText += 'Current Streak: 21 days\n';
        readableText += 'Success Rate: 89%\n\n';
        readableText += 'RECENT FASTS:\n';
        readableText += '-------------\n';
        
        allFastingData.slice(0, 10).forEach(fast => {
            readableText += `${fast.date}: ${fast.type} (${fast.duration}) - ${fast.status}\n`;
        });
        
        readableText += '\n\nGenerated by Fitness Portal';
        
        const dataBlob = new Blob([readableText], {type: 'text/plain'});
        const url = URL.createObjectURL(dataBlob);
        const link = document.createElement('a');
        link.href = url;
        link.download = 'fasting-history-report.txt';
        link.click();
        
        alert('Fasting history exported successfully!');
    }

    // Initialize with 30 days filter
    document.addEventListener('DOMContentLoaded', function() {
        filterHistory(30, 'Last 30 Days');
    });
</script>
@endsection
