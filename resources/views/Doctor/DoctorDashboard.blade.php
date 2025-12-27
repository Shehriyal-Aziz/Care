@extends('Doctor.headerfooter')

@section('content')
<style>
    /* === Alert Messages === */
    .alert {
        border-radius: 8px;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
        border: none;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .alert-success {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
    }

    .alert-danger {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: white;
    }

    .alert ul {
        padding-left: 1.5rem;
    }

    .alert .btn-close {
        filter: brightness(0) invert(1);
    }

    /* === Action Buttons === */
    .btn {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        border-radius: 6px;
        font-weight: 600;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }

    .btn-sm {
        padding: 0.4rem 0.8rem;
        font-size: 0.8rem;
    }

    .btn-danger {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: white;
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #c82333 0%, #bd2130 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    }

    .btn-danger:active {
        transform: translateY(0);
    }

    .dismiss-btn {
        white-space: nowrap;
    }

    /* === Compile Button Styles === */
    .btn-primary {
        background: linear-gradient(135deg, #0FB9B1 0%, #38BDF8 100%);
        color: white;
    }

    .btn-primary:hover:not(:disabled) {
        background: linear-gradient(135deg, #0da89f 0%, #2da3df 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(15, 185, 177, 0.3);
    }

    .btn-primary:disabled {
        background: #cbd5e0;
        color: #94a3b8;
        cursor: not-allowed;
        opacity: 0.6;
    }

    .countdown-badge {
        background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        white-space: nowrap;
    }

    .compiled-badge {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        white-space: nowrap;
    }

    .compile-btn {
        white-space: nowrap;
    }

    /* === Badge Styles === */
    .badge {
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: capitalize;
        display: inline-block;
    }

    /* === Base Styles === */
    .content-wrapper {
        background: #f8f9fa;
        padding: 1.5rem;
    }

    /* === Section Headers === */
    .section-header {
        background: white;
        padding: 1.25rem 1.5rem;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        margin-bottom: 1.5rem;
        border-left: 4px solid #28a745;
    }

    .section-header h3 {
        color: #2c3e50;
        font-weight: 600;
        margin: 0;
        font-size: 1.5rem;
    }

    /* === Card Container === */
    .card-container {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    /* === Status Indicators === */
    .status-available,
    .status-unavailable {
        font-weight: 600;
        display: inline-flex;
        align-items: center;
    }

    .status-available {
        color: #28a745;
    }

    .status-unavailable {
        color: #dc3545;
    }

    .status-available::before,
    .status-unavailable::before {
        content: "●";
        margin-right: 0.5rem;
        font-size: 1.2rem;
    }

    /* === Availability Table === */
    .availability-table-responsive {
        width: 100%;
        overflow-x: auto;
        border-radius: 8px;
    }

    .availability-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        margin: 0;
        min-width: 600px;
    }

    .availability-table thead {
        background: linear-gradient(90deg, #20c997 0%, #28a745 100%);
        color: #fff;
    }

    .availability-table th {
        padding: 1rem 1.25rem;
        text-align: left;
        font-weight: 600;
        letter-spacing: 0.5px;
        font-size: 0.9rem;
        text-transform: uppercase;
        border: none;
    }

    .availability-table td {
        padding: 1rem 1.25rem;
        text-align: left;
        border-bottom: 1px solid #f0f0f0;
        color: #2c3e50;
        font-size: 0.95rem;
    }

    .availability-table tbody tr {
        transition: background 0.2s ease;
    }

    .availability-table tbody tr:hover {
        background: #f8f9fa;
    }

    .availability-table tr:last-child td {
        border-bottom: none;
    }

    /* === Empty State === */
    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: #6c757d;
    }

    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #dee2e6;
    }

    /* === Update Availability Form === */
    .update-availability-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(40, 167, 69, 0.1);
        padding: 2rem;
        max-width: 700px;
        margin: 0 auto;
        border: 1px solid #e8f5e9;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.75rem;
        display: block;
        font-size: 0.95rem;
    }

    /* === Days Selector === */
    .days-selector {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 0.5rem;
    }

    .day-checkbox {
        position: relative;
    }

    .day-checkbox input[type="checkbox"] {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .day-checkbox label {
        display: block;
        padding: 0.75rem 0.5rem;
        background: #f8f9fa;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        text-align: center;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
        transition: all 0.3s ease;
        user-select: none;
        font-size: 0.85rem;
    }

    .day-checkbox input[type="checkbox"]:checked + label {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        border-color: #28a745;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
    }

    .day-checkbox label:hover {
        border-color: #28a745;
        transform: translateY(-2px);
    }

    /* === Time Picker with Clock === */
    .time-picker-wrapper {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .time-input {
        flex: 1;
        padding: 0.75rem 1rem;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 1rem;
        background: #f8f9fa;
        transition: all 0.3s ease;
        color: #2c3e50;
        font-weight: 600;
    }

    .time-input:focus {
        border-color: #28a745;
        outline: none;
        background: white;
        box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.1);
    }

    /* === Clock Display === */
    .clock-display {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.75rem;
    }

    .clock-face {
        position: relative;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: 3px solid #28a745;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .clock-center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 10px;
        height: 10px;
        background: #28a745;
        border-radius: 50%;
        z-index: 3;
    }

    .clock-hand {
        position: absolute;
        bottom: 50%;
        left: 50%;
        transform-origin: bottom center;
        background: #28a745;
        border-radius: 4px 4px 0 0;
        transition: transform 0.3s ease;
    }

    .hour-hand {
        width: 4px;
        height: 30px;
        margin-left: -2px;
        z-index: 2;
    }

    .minute-hand {
        width: 3px;
        height: 42px;
        margin-left: -1.5px;
        background: #20c997;
        z-index: 1;
    }

    .clock-number {
        position: absolute;
        width: 100%;
        height: 100%;
        text-align: center;
        font-size: 0.75rem;
        font-weight: 600;
        color: #2c3e50;
        transform: rotate(calc(var(--i) * 30deg));
    }

    .clock-number::after {
        position: absolute;
        top: 8px;
        left: 50%;
        transform: translateX(-50%) rotate(calc(var(--i) * -30deg));
        display: block;
    }

    .clock-number:nth-child(7)::after { content: '1'; }
    .clock-number:nth-child(8)::after { content: '2'; }
    .clock-number:nth-child(9)::after { content: '3'; }
    .clock-number:nth-child(10)::after { content: '4'; }
    .clock-number:nth-child(11)::after { content: '5'; }
    .clock-number:nth-child(12)::after { content: '6'; }
    .clock-number:nth-child(13)::after { content: '7'; }
    .clock-number:nth-child(14)::after { content: '8'; }
    .clock-number:nth-child(15)::after { content: '9'; }
    .clock-number:nth-child(16)::after { content: '10'; }
    .clock-number:nth-child(17)::after { content: '11'; }
    .clock-number:nth-child(18)::after { content: '12'; }

    .time-display {
        padding: 0.5rem 1rem;
        background: #28a745;
        color: white;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.95rem;
        min-width: 100px;
        text-align: center;
        box-shadow: 0 2px 6px rgba(40, 167, 69, 0.3);
    }

    /* === Checkbox Wrapper === */
    .checkbox-wrapper {
        display: flex;
        align-items: center;
        padding: 0.75rem;
        background: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .checkbox-wrapper input[type="checkbox"] {
        width: 20px;
        height: 20px;
        accent-color: #28a745;
        margin-right: 0.75rem;
        cursor: pointer;
    }

    .checkbox-wrapper label {
        margin: 0;
        cursor: pointer;
        user-select: none;
        font-weight: 600;
        color: #2c3e50;
    }

    /* === Submit Button === */
    button[type="submit"] {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
        color: white;
        font-weight: 600;
        padding: 0.875rem 2rem;
        width: 100%;
        border-radius: 8px;
        font-size: 1rem;
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.2);
        transition: all 0.3s ease;
        cursor: pointer;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    button[type="submit"]:hover {
        background: linear-gradient(135deg, #218838 0%, #1ea97c 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(40, 167, 69, 0.3);
    }

    button[type="submit"]:active {
        transform: translateY(0);
    }

    /* === Spacing === */
    .section-spacing {
        margin-bottom: 3rem;
    }

    /* === Responsive Design === */
    @media (max-width: 768px) {
        .content-wrapper {
            padding: 1rem;
        }

        .section-header h3 {
            font-size: 1.25rem;
        }

        .card-container,
        .update-availability-card {
            padding: 1rem;
        }

        .availability-table th,
        .availability-table td {
            padding: 0.75rem;
            font-size: 0.875rem;
        }

        .days-selector {
            grid-template-columns: repeat(4, 1fr);
        }

        .time-picker-wrapper {
            flex-direction: column;
            align-items: stretch;
        }

        .clock-display {
            margin-top: 1rem;
        }
    }
</style>

<div class="content-wrapper">
    <!-- Success/Error Messages -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('dismissed'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        <strong>Dismissed!</strong> {{ session('dismissed') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <strong>Validation Error!</strong>
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Appointment Requests Section (if you have appointments data) -->
    @if(isset($appointments))
    <div class="section-spacing">
        <div class="section-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
            <h3 style="margin: 0;"><i class="fas fa-calendar-check me-2"></i>Appointment Requests</h3>
            <div style="display: flex; gap: 0.75rem; align-items: center;">
                @php
                    // Get the start of current month
                    $monthStart = \Carbon\Carbon::now()->startOfMonth();
                    $today = \Carbon\Carbon::now();
                    
                    // Calculate days passed in current month
                    $daysPassed = $today->day;
                    $daysInMonth = $today->daysInMonth;
                    $daysRemaining = $daysInMonth - $daysPassed;
                    
                    // Check if 30 days have passed
                    $canCompile = $daysPassed >= 30;
                    
                    // Check if already compiled this month
                    $lastCompiled = session()->get('last_compiled_month');
                    $currentMonth = $today->format('Y-m');
                    $alreadyCompiled = ($lastCompiled === $currentMonth);
                @endphp
                
                @if(!$canCompile)
                    <span class="countdown-badge">
                        <i class="fas fa-clock me-1"></i>
                        {{ $daysRemaining }} days until compilation
                    </span>
                @endif
                
                @if($alreadyCompiled)
                    <span class="compiled-badge">
                        <i class="fas fa-check-circle me-1"></i>
                        Compiled for {{ \Carbon\Carbon::parse($currentMonth)->format('F Y') }}
                    </span>
                @endif
                
                <button type="button" 
                        class="btn btn-primary btn-sm compile-btn" 
                        onclick="compileMonthlyReport()"
                        {{ !$canCompile || $alreadyCompiled ? 'disabled' : '' }}
                        title="{{ !$canCompile ? 'Available after 30 days' : ($alreadyCompiled ? 'Already compiled this month' : 'Compile monthly report') }}">
                    <i class="fas fa-file-pdf me-1"></i>
                    {{ $alreadyCompiled ? 'Report Compiled' : 'Compile Monthly Report' }}
                </button>
            </div>
        </div>

        <div class="card-container">
            <div class="availability-table-responsive">
                <table class="availability-table" id="appointmentsTable">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Appointment Date</th>
                            <th>Department</th>
                            <th>Reason</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $appointment)
                        <tr id="appointment-row-{{ $appointment->id }}">
                            <td><strong>{{ $appointment->patient_name }}</strong></td>
                            <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</td>
                            <td>{{ $appointment->department ?? 'N/A' }}</td>
                            <td>{{ Str::limit($appointment->reason_for_visit, 30) ?? 'N/A' }}</td>
                            <td>
                                @if($appointment->status == 'Not Approved')
                                    <span class="badge" style="background: #ffc107; color: #000;">Pending</span>
                                @elseif($appointment->status == 'Approved')
                                    <span class="badge" style="background: #28a745; color: #fff;">Approved</span>
                                @else
                                    <span class="badge" style="background: #dc3545; color: #fff;">{{ $appointment->status }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    <!-- Your Availabilities Section -->
    <div class="section-spacing">
        <div class="section-header">
            <h3><i class="fas fa-clock me-2"></i>Your Availabilities</h3>
        </div>

        <div class="card-container">
            <div class="availability-table-responsive">
                <table class="availability-table">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($availabilities as $a)
                        <tr>
                            <td><strong>{{ $a->day_of_week }}</strong></td>
                            <td>{{ \Carbon\Carbon::parse($a->start_time)->format('h:i A') }}</td>
                            <td>{{ \Carbon\Carbon::parse($a->end_time)->format('h:i A') }}</td>
                            <td>
                                @if($a->is_available)
                                    <span class="status-available">Available</span>
                                @else
                                    <span class="status-unavailable">Not Available</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="empty-state">
                                <i class="fas fa-calendar-alt"></i>
                                <p class="mb-0">No availability schedule set</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Update Availability Section -->
    <div class="section-spacing">
        <div class="section-header">
            <h3><i class="fas fa-edit me-2"></i>Update Your Availability</h3>
        </div>

        <div class="card-container">
            <div class="update-availability-card">
                <form method="POST" action="{{ url('/doctor/availability') }}" id="availabilityForm">
                    @csrf
                    
                    <!-- Days Selection -->
                    <div class="form-group">
                        <label>
                            <i class="fas fa-calendar-week me-1"></i>Select Days
                        </label>
                        <div class="days-selector">
                            @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                            <div class="day-checkbox">
                                <input type="checkbox" name="days[]" value="{{ $day }}" id="day_{{ $day }}">
                                <label for="day_{{ $day }}">{{ substr($day, 0, 3) }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Start Time -->
                    <div class="form-group">
                        <label>
                            <i class="fas fa-clock me-1"></i>Start Time
                        </label>
                        <div class="time-picker-wrapper">
                            <input type="time" name="start_time" id="start_time" class="time-input" required>
                            <div class="clock-display">
                                <div class="clock-face">
                                    <div class="clock-center"></div>
                                    <div class="clock-hand hour-hand" id="startHourHand"></div>
                                    <div class="clock-hand minute-hand" id="startMinuteHand"></div>
                                    @for($i = 1; $i <= 12; $i++)
                                    <div class="clock-number" style="--i: {{ $i }}"></div>
                                    @endfor
                                </div>
                                <div class="time-display" id="startTimeDisplay">09:00 AM</div>
                            </div>
                        </div>
                    </div>

                    <!-- End Time -->
                    <div class="form-group">
                        <label>
                            <i class="fas fa-clock me-1"></i>End Time
                        </label>
                        <div class="time-picker-wrapper">
                            <input type="time" name="end_time" id="end_time" class="time-input" required>
                            <div class="clock-display">
                                <div class="clock-face">
                                    <div class="clock-center"></div>
                                    <div class="clock-hand hour-hand" id="endHourHand"></div>
                                    <div class="clock-hand minute-hand" id="endMinuteHand"></div>
                                    @for($i = 1; $i <= 12; $i++)
                                    <div class="clock-number" style="--i: {{ $i }}"></div>
                                    @endfor
                                </div>
                                <div class="time-display" id="endTimeDisplay">05:00 PM</div>
                            </div>
                        </div>
                    </div>

                    <!-- Availability Checkbox -->
                    <div class="checkbox-wrapper">
                        <input type="checkbox" name="is_available" id="is_available" checked>
                        <label for="is_available">
                            <i class="fas fa-check-circle me-1"></i>Mark as Available
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit">
                        <i class="fas fa-save me-2"></i>Save Availability
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    'use strict';

    // Clock update function
    function updateClock(timeInput, hourHand, minuteHand, timeDisplay) {
        const time = timeInput.value || '00:00';
        const [hours, minutes] = time.split(':');
        const h = parseInt(hours);
        const m = parseInt(minutes);
        
        // Calculate angles
        const hourDeg = (h % 12) * 30 + m * 0.5;
        const minuteDeg = m * 6;
        
        // Update hands
        hourHand.style.transform = `rotate(${hourDeg}deg)`;
        minuteHand.style.transform = `rotate(${minuteDeg}deg)`;
        
        // Update display
        const displayHours = h > 12 ? h - 12 : (h === 0 ? 12 : h);
        const period = h >= 12 ? 'PM' : 'AM';
        timeDisplay.textContent = `${displayHours.toString().padStart(2, '0')}:${minutes} ${period}`;
    }

    // Compile monthly report function
    window.compileMonthlyReport = function() {
        if (confirm('This will compile all appointments from the last 30 days into a PDF report and save it to the database. Continue?')) {
            const btn = document.querySelector('.compile-btn');
            const originalText = btn.innerHTML;
            
            // Show loading state
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Compiling...';
            
            // Send AJAX request
            fetch('/doctor/appointments/compile-monthly', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification(data.message, 'success');
                    
                    // Update button state
                    btn.innerHTML = '<i class="fas fa-check-circle me-1"></i>Report Compiled';
                    
                    // Reload page after 2 seconds to show updated state
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    throw new Error(data.message || 'Failed to compile report');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Failed to compile report. Please try again.', 'error');
                btn.disabled = false;
                btn.innerHTML = originalText;
            });
        }
    };

    // Show notification function
    function showNotification(message, type = 'success') {
        const bgColor = type === 'success' 
            ? 'linear-gradient(135deg, #28a745 0%, #20c997 100%)'
            : 'linear-gradient(135deg, #dc3545 0%, #c82333 100%)';
        
        const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
        
        const notification = document.createElement('div');
        notification.className = 'alert alert-dismissible fade show';
        notification.style.position = 'fixed';
        notification.style.top = '20px';
        notification.style.right = '20px';
        notification.style.zIndex = '10000';
        notification.style.minWidth = '300px';
        notification.style.background = bgColor;
        notification.style.color = 'white';
        notification.style.borderRadius = '8px';
        notification.style.padding = '1rem 1.25rem';
        notification.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
        notification.innerHTML = `
            <i class="fas ${icon} me-2"></i>
            <strong>${type === 'success' ? 'Success!' : 'Error!'}</strong> ${message}
            <button type="button" class="btn-close" onclick="this.parentElement.remove()" style="filter: brightness(0) invert(1);"></button>
        `;
        
        document.body.appendChild(notification);
        
        // Auto remove after 5 seconds
        setTimeout(function() {
            notification.style.opacity = '0';
            notification.style.transition = 'opacity 0.3s ease';
            setTimeout(function() {
                notification.remove();
            }, 300);
        }, 5000);
    }

    // Initialize on DOM ready
    document.addEventListener('DOMContentLoaded', function() {
        // Get elements
        const startTimeInput = document.getElementById('start_time');
        const endTimeInput = document.getElementById('end_time');
        const startHourHand = document.getElementById('startHourHand');
        const startMinuteHand = document.getElementById('startMinuteHand');
        const endHourHand = document.getElementById('endHourHand');
        const endMinuteHand = document.getElementById('endMinuteHand');
        const startTimeDisplay = document.getElementById('startTimeDisplay');
        const endTimeDisplay = document.getElementById('endTimeDisplay');
        const form = document.getElementById('availabilityForm');

        // Set default times
        if (startTimeInput) {
            startTimeInput.value = '09:00';
            endTimeInput.value = '17:00';

            // Initialize clocks
            updateClock(startTimeInput, startHourHand, startMinuteHand, startTimeDisplay);
            updateClock(endTimeInput, endHourHand, endMinuteHand, endTimeDisplay);

            // Event listeners for time changes
            startTimeInput.addEventListener('change', function() {
                updateClock(startTimeInput, startHourHand, startMinuteHand, startTimeDisplay);
            });

            endTimeInput.addEventListener('change', function() {
                updateClock(endTimeInput, endHourHand, endMinuteHand, endTimeDisplay);
            });
        }

        // Form validation
        if (form) {
            form.addEventListener('submit', function(e) {
                const checkedDays = document.querySelectorAll('input[name="days[]"]:checked');
                if (checkedDays.length === 0) {
                    e.preventDefault();
                    alert('Please select at least one day');
                    return false;
                }

                // Validate time range
                const startTime = startTimeInput.value;
                const endTime = endTimeInput.value;
                if (startTime >= endTime) {
                    e.preventDefault();
                    alert('End time must be after start time');
                    return false;
                }
            });
        }
    });
})();
</script>

@endsection