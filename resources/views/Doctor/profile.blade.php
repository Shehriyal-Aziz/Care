@extends('Doctor.headerfooter')

@section('content')
<style>
:root{
    --primary:#0FB9B1;
    --secondary:#38BDF8;
    --dark:#1E3A8A;
    --bg:#F8FAFC;
}

/* PAGE */
body{ background:var(--bg); }

/* WRAPPER */
.wrapper{
    max-width:1200px;
    margin:40px auto;
    padding:0 16px;
}

/* CARD */
.card{
    background:linear-gradient(135deg,#D1FAE5,#CFFAFE,#F8FAFC);
    border-radius:22px;
    box-shadow:0 15px 45px rgba(15,185,177,.25);
    padding:40px;
    position:relative;
}

/* EDIT */
.edit-btn{
    position:absolute;
    top:20px;
    right:20px;
    width:48px;
    height:48px;
    border-radius:50%;
    border:none;
    background:linear-gradient(135deg,var(--dark),var(--primary));
    color:#fff;
    font-size:1.2rem;
}

/* HEADER */
.header{
    display:flex;
    gap:30px;
    align-items:center;
    flex-wrap:wrap;
}
.avatar{
    width:160px;
    height:160px;
    border-radius:50%;
    border:5px solid var(--primary);
    overflow:hidden;
    flex-shrink:0;
}
.avatar img{
    width:100%;
    height:100%;
    object-fit:cover;
}
.name{
    font-size:2.3rem;
    font-weight:800;
}
.role{
    background:linear-gradient(90deg,var(--primary),var(--secondary));
    color:#fff;
    padding:8px 22px;
    border-radius:20px;
    font-weight:700;
    margin-top:10px;
    display:inline-block;
}

/* ANALYTICS */
.analytics{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
    gap:20px;
    margin:45px 0;
}
.stat{
    background:#fff;
    border-radius:18px;
    padding:22px;
    text-align:center;
    border:1.5px solid var(--primary);
}
.stat h2{
    color:var(--primary);
    font-size:2.1rem;
}
.stat p{
    color:#374151;
    font-weight:600;
}

/* GRID */
.grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:30px;
}

/* SECTION */
.section{
    background:#fff;
    border-radius:18px;
    padding:28px;
    border:1.5px solid var(--primary);
}
.section h3{
    color:var(--dark);
    margin-bottom:18px;
}

/* INFO */
.info{
    display:grid;
    grid-template-columns:140px 1fr;
    row-gap:12px;
    column-gap:12px;
}
.info span{
    word-break:break-word;
}

/* CALENDAR */
.calendar{
    display:grid;
    grid-template-columns:repeat(7,1fr);
    gap:10px;
}
.day{
    padding:12px 0;
    border-radius:12px;
    text-align:center;
    font-weight:700;
    background:#ECFEFF;
    color:var(--primary);
    font-size:.9rem;
}
.available{
    background:linear-gradient(135deg,#0FB9B1,#38BDF8);
    color:#fff;
}
.unavailable{
    background:#FEE2E2;
    color:#991B1B;
}

/* MODAL */
.modal-bg{
    position:fixed;
    inset:0;
    background:rgba(15,23,42,.5);
    display:none;
    justify-content:center;
    align-items:center;
    z-index:9999;
    padding:20px;
}
.modal{
    background:#fff;
    padding:30px;
    border-radius:22px;
    width:100%;
    max-width:420px;
    position:relative;
}
.close{
    position:absolute;
    right:18px;
    top:12px;
    background:none;
    border:none;
    font-size:2rem;
    color:var(--primary);
}

/* FORM */
input{
    width:100%;
    padding:12px;
    border-radius:12px;
    border:1.5px solid var(--primary);
    margin-bottom:14px;
}
.save{
    width:100%;
    background:linear-gradient(90deg,var(--primary),var(--secondary));
    color:#fff;
    border:none;
    padding:14px;
    border-radius:18px;
    font-weight:700;
}

/* =========================
   RESPONSIVE BREAKPOINTS
========================= */

/* Tablets */
@media(max-width:1024px){
    .grid{
        grid-template-columns:1fr;
    }
}

/* Mobiles */
@media(max-width:600px){
    .card{
        padding:25px 20px;
    }

    .header{
        justify-content:center;
        text-align:center;
    }

    .avatar{
        width:130px;
        height:130px;
    }

    .name{
        font-size:1.8rem;
    }

    .analytics{
        margin:30px 0;
    }

    .info{
        grid-template-columns:1fr;
    }

    .calendar{
        grid-template-columns:repeat(4,1fr);
    }
}
</style>

<div class="wrapper">
<div class="card">

<button class="edit-btn" onclick="openModal()">
<i class="fa fa-pen"></i>
</button>

<div class="header">
<div class="avatar">
<img src="https://ui-avatars.com/api/?name={{ urlencode($doctor->name) }}&background=1E3A8A&color=fff">
</div>
<div>
<div class="name">{{ $doctor->name }}</div>
<div class="role">Doctor</div>
</div>
</div>

<!-- 📊 ANALYTICS -->
<div class="analytics">
<div class="stat"><h2>42</h2><p>Total Patients</p></div>
<div class="stat"><h2>18</h2><p>Appointments</p></div>
<div class="stat"><h2>96%</h2><p>Success Rate</p></div>
<div class="stat"><h2>4.9★</h2><p>Rating</p></div>
</div>

<div class="grid">

<!-- INFO -->
<div class="section">
<h3>Personal Info</h3>
<div class="info">
<span>Email</span><span>{{ $doctor->email }}</span>
<span>Phone</span><span>{{ $doctor->phone ?? 'Not Provided' }}</span>
<span>Specialization</span><span>{{ $doctor->specialization ?? 'Not Provided' }}</span>
<span>Experience</span><span>{{ $doctor->experience ?? 'Not Provided' }}</span>
</div>
</div>

<!-- 🩺 AVAILABILITY -->
<div class="section">
<h3>Weekly Availability</h3>
<div class="calendar">
<div class="day available">Mon</div>
<div class="day available">Tue</div>
<div class="day unavailable">Wed</div>
<div class="day available">Thu</div>
<div class="day available">Fri</div>
<div class="day unavailable">Sat</div>
<div class="day unavailable">Sun</div>
</div>
</div>

</div>
</div>
</div>

<!-- MODAL -->
<div class="modal-bg" id="modal">
<div class="modal">
<button class="close" onclick="closeModal()">&times;</button>
<h3>Edit Profile</h3>
<form method="POST" action="{{ route('doctor.profile.update') }}">
@csrf
<input name="name" value="{{ $doctor->name }}">
<input name="email" value="{{ $doctor->email }}">
<input name="phone" value="{{ $doctor->phone }}">
<input name="specialization" value="{{ $doctor->specialization }}">
<input name="experience" value="{{ $doctor->experience }}">
<button class="save">Save Changes</button>
</form>
</div>
</div>

<script>
function openModal(){
    document.getElementById('modal').style.display='flex';
}
function closeModal(){
    document.getElementById('modal').style.display='none';
}
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection