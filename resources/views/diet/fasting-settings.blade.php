@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-black mb-1">Fasting Settings</h1>
                    <p class="text-muted mb-0">Customize your fasting preferences and goals</p>
                </div>
                <div>
                    <button class="btn btn-outline-primary rounded-pill" onclick="history.back()">
                        <i class="fas fa-arrow-left me-2"></i>Back to Tracker
                    </button>
                </div>
            </div>

            <!-- Fasting Preferences -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 p-4">
                    <h5 class="fw-black mb-0">Fasting Preferences</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <label class="form-label fw-bold">Default Fasting Type</label>
                        <select class="form-select rounded-pill">
                            <option>Intermittent Fasting (16:8)</option>
                            <option>Extended Fasting (24:0)</option>
                            <option>Alternate Day Fasting</option>
                            <option>5:2 Diet</option>
                            <option>Custom</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Preferred Start Time</label>
                        <input type="time" class="form-control rounded-pill" value="20:00">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Preferred End Time</label>
                        <input type="time" class="form-control rounded-pill" value="12:00">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Fasting Days</label>
                        <div class="d-flex flex-wrap gap-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="monday" checked>
                                <label class="form-check-label" for="monday">Monday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tuesday" checked>
                                <label class="form-check-label" for="tuesday">Tuesday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wednesday" checked>
                                <label class="form-check-label" for="wednesday">Wednesday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="thursday" checked>
                                <label class="form-check-label" for="thursday">Thursday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="friday" checked>
                                <label class="form-check-label" for="friday">Friday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="saturday">
                                <label class="form-check-label" for="saturday">Saturday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sunday">
                                <label class="form-check-label" for="sunday">Sunday</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifications -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 p-4">
                    <h5 class="fw-black mb-0">Notifications</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="startReminder" checked>
                            <label class="form-check-label" for="startReminder">
                                <strong>Start Fasting Reminder</strong>
                                <p class="text-muted mb-0">Get notified when it's time to start your fast</p>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="endReminder" checked>
                            <label class="form-check-label" for="endReminder">
                                <strong>End Fasting Reminder</strong>
                                <p class="text-muted mb-0">Get notified when it's time to break your fast</p>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="milestoneAlerts" checked>
                            <label class="form-check-label" for="milestoneAlerts">
                                <strong>Milestone Alerts</strong>
                                <p class="text-muted mb-0">Celebrate when you reach fasting milestones</p>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="weeklyReports">
                            <label class="form-check-label" for="weeklyReports">
                                <strong>Weekly Reports</strong>
                                <p class="text-muted mb-0">Receive weekly fasting summary reports</p>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Goals -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 p-4">
                    <h5 class="fw-black mb-0">Goals</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <label class="form-label fw-bold">Weekly Fasting Goal</label>
                        <div class="input-group">
                            <input type="number" class="form-control rounded-pill" value="5" min="1" max="7">
                            <span class="input-group-text">days per week</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Streak Goal</label>
                        <div class="input-group">
                            <input type="number" class="form-control rounded-pill" value="30" min="1">
                            <span class="input-group-text">days</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Target Duration</label>
                        <select class="form-select rounded-pill">
                            <option>12-16 hours</option>
                            <option selected>16-20 hours</option>
                            <option>20-24 hours</option>
                            <option>24+ hours</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Current Settings Display -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 p-4">
                    <h5 class="fw-black mb-0">Current Settings</h5>
                </div>
                <div class="card-body p-4">
                    <div id="currentSettingsDisplay">
                        <p class="text-muted">No settings saved yet. Configure and save your preferences above.</p>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="d-grid gap-2">
                <button class="btn btn-primary rounded-pill p-3" onclick="saveSettings()">
                    <i class="fas fa-save me-2"></i>Save Settings
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.fw-black { font-weight: 900; }
</style>

@section('scripts')
<script>
    function saveSettings() {
        // Collect all settings
        const settings = {
            fastingType: document.querySelector('select').value,
            startTime: document.querySelector('input[type="time"]').value,
            endTime: document.querySelectorAll('input[type="time"]')[1].value,
            fastingDays: [],
            notifications: {
                startReminder: document.getElementById('startReminder').checked,
                endReminder: document.getElementById('endReminder').checked,
                milestoneAlerts: document.getElementById('milestoneAlerts').checked,
                weeklyReports: document.getElementById('weeklyReports').checked
            },
            goals: {
                weeklyGoal: document.querySelector('input[type="number"]').value,
                streakGoal: document.querySelectorAll('input[type="number"]')[1].value,
                targetDuration: document.querySelectorAll('select')[1].value
            }
        };

        // Collect fasting days
        const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        days.forEach(day => {
            if (document.getElementById(day).checked) {
                settings.fastingDays.push(day);
            }
        });

        // Save to localStorage
        localStorage.setItem('fastingSettings', JSON.stringify(settings));
        
        // Set up notifications if enabled
        if (settings.notifications.startReminder) {
            setupNotification('start', settings.startTime);
        }
        if (settings.notifications.endReminder) {
            setupNotification('end', settings.endTime);
        }
        
        // Display saved settings
        displayCurrentSettings(settings);
        
        // Show success message without alert
        showSuccessMessage();
        
        console.log('Saving settings:', settings);
    }

    function setupNotification(type, time) {
        // Request notification permission
        if ('Notification' in window && Notification.permission === 'granted') {
            // Schedule notification (in real app, would use service worker or backend)
            console.log(`Setting up ${type} notification at ${time}`);
        } else if ('Notification' in window && Notification.permission !== 'denied') {
            Notification.requestPermission().then(permission => {
                if (permission === 'granted') {
                    console.log(`Notification permission granted for ${type} at ${time}`);
                }
            });
        }
    }

    function showSuccessMessage() {
        // Create success message element
        const successDiv = document.createElement('div');
        successDiv.className = 'alert alert-success alert-dismissible fade show rounded-4';
        successDiv.innerHTML = `
            <strong>Success!</strong> Your fasting settings have been saved.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        // Insert after the header
        const header = document.querySelector('.d-flex.justify-content-between.align-items-center');
        if (header) {
            header.parentNode.insertBefore(successDiv, header.nextSibling);
        }
        
        // Auto-remove after 3 seconds
        setTimeout(() => {
            if (successDiv.parentNode) {
                successDiv.remove();
            }
        }, 3000);
    }

    function displayCurrentSettings(settings) {
        const displayElement = document.getElementById('currentSettingsDisplay');
        if (displayElement) {
            let html = '<div class="alert alert-info rounded-4"><h6 class="fw-bold mb-3">✅ Your Saved Settings:</h6>';
            html += '<div class="row g-3">';
            html += '<div class="col-md-6"><strong>🍽️ Fasting Type:</strong> ' + settings.fastingType + '</div>';
            html += '<div class="col-md-6"><strong>⏰ Time Window:</strong> ' + settings.startTime + ' - ' + settings.endTime + '</div>';
            html += '<div class="col-md-6"><strong>📅 Fasting Days:</strong> ' + settings.fastingDays.join(', ') + '</div>';
            html += '<div class="col-md-6"><strong>🎯 Weekly Goal:</strong> ' + settings.goals.weeklyGoal + ' days</div>';
            html += '<div class="col-md-6"><strong>🔥 Streak Goal:</strong> ' + settings.goals.streakGoal + ' days</div>';
            html += '<div class="col-md-6"><strong>⏱️ Target Duration:</strong> ' + settings.goals.targetDuration + '</div>';
            html += '</div>';
            
            html += '<hr><h6>🔔 Notifications Status:</h6><ul class="mb-0">';
            if (settings.notifications.startReminder) html += '<li>✅ Start Reminder: Active</li>';
            if (settings.notifications.endReminder) html += '<li>✅ End Reminder: Active</li>';
            if (settings.notifications.milestoneAlerts) html += '<li>✅ Milestone Alerts: Active</li>';
            if (settings.notifications.weeklyReports) html += '<li>✅ Weekly Reports: Active</li>';
            html += '</ul></div>';
            
            displayElement.innerHTML = html;
        }
    }

    // Load existing settings on page load
    document.addEventListener('DOMContentLoaded', function() {
        const savedSettings = localStorage.getItem('fastingSettings');
        if (savedSettings) {
            const settings = JSON.parse(savedSettings);
            
            // Apply saved settings to form
            document.querySelector('select').value = settings.fastingType;
            document.querySelector('input[type="time"]').value = settings.startTime;
            document.querySelectorAll('input[type="time"]')[1].value = settings.endTime;
            document.querySelector('input[type="number"]').value = settings.goals.weeklyGoal;
            document.querySelectorAll('input[type="number"]')[1].value = settings.goals.streakGoal;
            document.querySelectorAll('select')[1].value = settings.goals.targetDuration;
            
            // Set fasting days
            const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
            days.forEach(day => {
                document.getElementById(day).checked = settings.fastingDays.includes(day);
            });
            
            // Set notifications
            document.getElementById('startReminder').checked = settings.notifications.startReminder;
            document.getElementById('endReminder').checked = settings.notifications.endReminder;
            document.getElementById('milestoneAlerts').checked = settings.notifications.milestoneAlerts;
            document.getElementById('weeklyReports').checked = settings.notifications.weeklyReports;
            
            // Display current settings
            displayCurrentSettings(settings);
        }
    });
</script>
@endsection
