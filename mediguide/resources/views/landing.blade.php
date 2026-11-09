@extends('layouts.app')
@section('content')
    <header class="hero">
        <img class="hero-banner" src="{{ asset('images/hero-banner.png') }}" alt="">
        <div class="wrap">
            <div>
                <span class="pill"><svg class="inline-icon" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3 1.8 6.2L20 11l-6.2 1.8L12 19l-1.8-6.2L4 11l6.2-1.8L12 3Z"/><path d="m19 15 .8 2.2L22 18l-2.2.8L19 21l-.8-2.2L16 18l2.2-.8L19 15Z"/></svg> Intelligent Healthcare Navigation</span>
                <h1>Find the right care, without the confusion.</h1>
                <p class="lead">Describe your concerns, explore verified healthcare services, and connect with clinical
                    professionals through gentle, guided AI navigation.</p>
                <a class="btn p lg" href="{{ route('register', 'user') }}">Get Started Free →</a> <a class="btn lg"
                    href="#services"><svg class="inline-icon" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><circle cx="11" cy="11" r="6.5"/><path d="m16 16 4 4"/></svg> Explore Services</a>
                <div class="trust"><span>HIPAA &amp; Privacy First</span><span>No Medical Prescriptions</span><span>10k+
                        Patients Guided</span></div>
            </div>
            <div class="mock">
                <div class="chat">
                    <h4>MediGuide AI Assistant</h4><small style="color:var(--mut)">Active Clinical Routing</small>
                    <div class="q">“I've been feeling persistent migraine and fatigue for 3 days. Which specialist
                        should I consult?”</div>
                    <div class="rec">Recommended: Neurologist or Primary Physician<br><small
                            style="font-weight:400">Found 4 verified practitioners with open slots today.</small></div>
                    <small style="display:block;margin-top:10px;color:var(--mut);text-align:center">Conceptual navigation
                        layout — not a direct medical diagnosis</small>
                </div>
                <div class="badge" style="right:14px;top:8px">Dr. Elena Vance, MD<br><small
                        style="color:var(--t)">Available Today 2:30 PM</small></div>
                <div class="badge" style="left:14px;bottom:10px"><svg class="inline-icon" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="m8 12 2.5 2.5L16 9"/></svg> Appointment Confirmed<br><small>No double-booking
                        risk</small></div>
            </div>
        </div>
    </header>


 



    <section class="s" id="services">
        <div class="wrap">
            <div class="sh"><span class="pill bl">Healthcare Made Simple</span>
                <h2>Comprehensive care features at your fingertips</h2>
                <p>Each service is carefully designed to remove friction, guide you to qualified care, and eliminate
                    confusion along your medical journey.</p>
            </div>
            <div class="g4">
                <div class="card fc t">
                    <div class="ic"><svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 4v6a4 4 0 0 0 8 0V4"/><path d="M6 4H4v2m10-2h2v2"/><path d="M10 14v2a4 4 0 0 0 8 0v-1"/><circle cx="18" cy="13" r="2"/></svg></div>
                    <h3>Doctor Appointments</h3>
                    <p>Explore vetted general practitioners and specialists with transparent patient reviews and verified
                        availability.</p><a href="{{ route('register', 'user') }}">Explore Doctors →</a>
                </div>
                <div class="card fc b">
                    <div class="ic"><svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3h6m-5 0v6l-4.5 8a2 2 0 0 0 1.8 3h9.4a2 2 0 0 0 1.8-3L14 9V3"/><path d="M8 15h8"/></svg></div>
                    <h3>Diagnostic Tests</h3>
                    <p>Discover accredited lab services, imaging centers, and clinical bloodwork with upfront prep
                        instructions.</p><a href="{{ route('register', 'user') }}">Explore Tests →</a>
                </div>
                <div class="card fc p">
                    <div class="ic"><svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="7" width="16" height="13" rx="3"/><path d="M12 3v4m-4 5h.01M16 12h.01M9 16h6"/></svg></div>
                    <h3>AI Care Navigation</h3>
                    <p>Get empathetic conversational assistance to clarify symptoms and point you toward appropriate
                        clinical care levels.</p><a href="#ai">Explore AI Guide →</a>
                </div>
                <div class="card fc o">
                    <div class="ic"><svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18"/><path d="m9 15 2 2 4-4"/></svg></div>
                    <h3>Booking Protection</h3>
                    <p>Automatic conflict prevention, cancellation protection, and calendar syncing across multiple
                        healthcare providers.</p><a href="#faq">Learn More →</a>
                </div>
            </div>
        </div>
    </section>

    <section class="s alt" id="how">
        <div class="wrap">
            <div class="sh"><span class="pill or">How MediGuide AI Works</span>
                <h2>A smooth, connected 4-step path to care</h2>
                <p>Experience a frictionless transition from your first symptom check to verified clinical appointment
                    confirmation.</p>
            </div>
            <div class="steps">
                <div class="g4">
                    <div class="card step"><b>1</b>
                        <h3>Create Account</h3>
                        <p>Register in seconds and complete swift, encrypted OTP verification.</p>
                    </div>
                    <div class="card step"><b>2</b>
                        <h3>Find Services</h3>
                        <p>Explore matching doctors, diagnostic facilities, or conversational AI guidance.</p>
                    </div>
                    <div class="card step"><b>3</b>
                        <h3>Book Appointment</h3>
                        <p>Select convenient available slots with instant calendar reservation locks.</p>
                    </div>
                    <div class="card step"><b>4</b>
                        <h3>Track &amp; Manage</h3>
                        <p>Review consultation reminders, prep steps, and medical logs from your dashboard.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="s" id="ai" style="background:linear-gradient(180deg,#eaf6f5,#f6fbfb)">
        <div class="wrap two">
            <div>
                <span class="pill"><svg class="inline-icon" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3 1.8 6.2L20 11l-6.2 1.8L12 19l-1.8-6.2L4 11l6.2-1.8L12 3Z"/></svg> Meet Your AI Guide</span>
                <h2>A clearer, calmer way to explore healthcare options.</h2>
                <p class="l">See how MediGuide AI helps you formulate your health question, answers gentle follow-up
                    prompts, and points you directly to matching local specialists.</p>
                <ul class="chk">
                    <li>Smart medical taxonomy without confusing jargon</li>
                    <li>Strict clinical guardrails: navigation only, zero diagnosing</li>
                    <li>Direct one-tap transition to certified doctor bookings</li>
                </ul>
            </div>
            <div class="demo">
                <div style="display:flex;justify-content:space-between"><b>MediGuide AI Assistant<br><small
                            style="font-weight:400;color:var(--mut)">Interactive clinical demonstration</small></b><span
                        class="pill bl" style="height:max-content">Interactive Demo</span></div>
                <div class="bub">I need help finding a healthcare service.</div>
                <div class="pv" style="display:block;background:#fff">I can help you explore the services available on
                    MediGuide AI. What would you like to find today?
                    <div id="opts">
                        <div class="opt on"><span class="option-indicator" aria-hidden="true"></span>A doctor or specialist</div>
                        <div class="opt"><span class="option-indicator" aria-hidden="true"></span>Diagnostic test &amp; lab information</div>
                        <div class="opt"><span class="option-indicator" aria-hidden="true"></span>I'm not sure yet — guide me through symptoms</div>
                    </div>
                </div>
                <small style="color:var(--mut)">Demonstration mode • MediGuide does not diagnose or prescribe</small>
            </div>
        </div>
    </section>
    <script>
        document.querySelectorAll('#opts .opt').forEach(o => o.onclick = () => {
            document.querySelectorAll('#opts .opt').forEach(x => {
                x.classList.remove('on');
            });
            o.classList.add('on');
        })
    </script>

    <section class="s" id="trust">
        <div class="wrap two">
            <div class="trustphoto">
              
                <img src="{{ asset('images/doctor-trustss.png') }}" class="tp-front" alt="">
                
            </div>
            <div class="trust-content">
                <span class="pill">Privacy, Security &amp; Clinical Boundaries</span>
                <h2>Healthcare trust built into every layer.</h2>
                <p class="l">We hold ourselves to rigorous medical information standards, ensuring your personal health
                    details remain private and responsibly protected.</p>
                <div class="trust-cards">
                    <div class="pv">
                        <svg class="pv-icon" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="10" width="16" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3m-4 4v3"/></svg>
                        <div><b>Account Verification &amp; OTP Security</b><span>Multi-factor authentication guarantees that
                                only you access your medical records and appointments.</span></div>
                    </div>
                    <div class="pv">
                        <svg class="pv-icon" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z"/><path d="m9 12 2 2 4-4"/></svg>
                        <div><b>Responsible AI Guidance Guardrails</b><span>MediGuide AI assists in finding relevant care
                                options and explicitly never replaces professional clinical diagnosis or
                                prescriptions.</span></div>
                    </div>
                    <div class="pv">
                        <svg class="pv-icon" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M7 3h7l5 5v13H7z"/><path d="M14 3v5h5M10 13h6m-6 4h6"/></svg>
                        <div><b>Patient Privacy &amp; Full Data Control</b><span>Transparent policies explain what data is
                                collected, how it connects to clinics, and how you can export or delete your profile
                                anytime.</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const trustContent = document.querySelector('.trust-content');

        if (trustContent && 'IntersectionObserver' in window) {
            trustContent.classList.add('reveal-ready');

            const trustObserver = new IntersectionObserver(entries => {
                if (entries.some(entry => entry.isIntersecting)) {
                    trustContent.classList.add('is-visible');
                    trustObserver.unobserve(trustContent);
                }
            }, { threshold: 0.15 });

            trustObserver.observe(trustContent);
        }
    </script>

    <section class="s alt" id="faq">
        <div class="wrap" style="max-width:760px">
            <div class="sh"><span class="pill pu">Frequently Asked Questions</span>
                <h2>Common questions about MediGuide AI</h2>
                <p>Everything you need to know about our intelligent routing, clinician bookings, and safety principles.</p>
            </div>
            <details open>
                <summary>What is MediGuide AI? <span>⌃</span></summary>
                <p>MediGuide AI is an intelligent healthcare guidance and booking management platform. It streamlines
                    discovering services, understanding diagnostic tests, and finding your next steps with empathetic
                    conversational assistance.</p>
            </details>
            <details>
                <summary>Does MediGuide AI replace a doctor? <span>⌄</span></summary>
                <p>No. It only helps you navigate services; it never diagnoses or prescribes.</p>
            </details>
            <details>
                <summary>How do I create an account and verify identity? <span>⌄</span></summary>
                <p>Register, then enter the one-time password (OTP) sent to you, and sign in.</p>
            </details>
            <details>
                <summary>Can I book appointments directly without phone calls? <span>⌄</span></summary>
                <p>Online booking with duplicate-booking prevention arrives in the next release phase.</p>
            </details>
        </div>
    </section>

    <section class="s">
        <div class="wrap">
            <div class="sh"><span class="pill bl">Tailored Access</span>
                <h2>Dedicated experiences for patients and doctors</h2>
                <p>Public access tailored strictly to the two care roles. Administrator access is securely segregated on
                    internal infrastructure.</p>
            </div>
            <div class="g2">
                <div class="portal t">
                    <div class="ic"><svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg></div><span class="pill" style="float:right;margin-top:-60px">Patient
                        Access</span>
                    <h3>Patient Portal</h3>
                    <p>Create an account, consult conversational healthcare guidance, and access your appointment management
                        dashboard.</p><a class="btn p full lg" href="{{ route('login', 'patient') }}">Patient Sign In
                        →</a><a class="sub" href="{{ route('register', 'user') }}">New patient? Create Account →</a>
                </div>
                <div class="portal b">
                    <div class="ic"><svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 4v6a4 4 0 0 0 8 0V4"/><path d="M6 4H4v2m10-2h2v2"/><path d="M10 14v2a4 4 0 0 0 8 0v-1"/><circle cx="18" cy="13" r="2"/></svg></div><span class="pill bl" style="float:right;margin-top:-60px">Clinician
                        Access</span>
                    <h3>Doctor Portal</h3>
                    <p>Register your practice, synchronize schedule availability, and access your professional clinic
                        dashboard.</p><a class="btn b full lg" href="{{ route('login', 'doctor') }}">Doctor Sign In
                        →</a><a class="sub" style="color:var(--bl)" href="{{ route('register', 'doctor') }}">Join our
                        provider
                        network? Doctor Registration →</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="wrap">
            <div class="cta">
                <div class="cta-mark"><svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8l1.1 1.1L12 21l7.8-7.5 1.1-1.1a5.5 5.5 0 0 0-.1-7.8Z"/></svg></div>
                <h2>Your healthcare journey starts here.</h2>
                <p>Discover a simpler, transparent way to navigate healthcare services and access verified providers in
                    minutes.</p><a class="btn w lg" href="{{ route('register', 'user') }}">Create Patient Account →</a>
                <p style="margin:18px 0 0;font-size:12px">Are you a healthcare professional? <a
                        href="{{ route('register', 'doctor') }}"><b>Doctor Registration →</b></a></p>
            </div>
        </div>
    </section>
@endsection
