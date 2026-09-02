@extends('app')

@section('content')
<main id="home" class="pt-20">
    <section class="home-hero">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-12 gap-10 lg:gap-16 items-center">
            <div class="lg:col-span-6">
                <p class="home-kicker"><span></span> Firebrand Christian Life Ministry</p>
                <h1>Find a home for your <em>faith.</em></h1>
                <p class="home-intro">A welcoming community helping people discover the love of God, experience His power, and live with purpose.</p>
                <div class="flex flex-wrap gap-3 mt-8">
                    <a href="{{ route('programmes') }}" class="home-primary">Explore our programmes <i class="fas fa-arrow-right"></i></a>
                    <a href="{{ route('about') }}" class="home-secondary">Our story</a>
                </div>
                <div class="home-note">
                    <div class="home-note-mark">“</div>
                    <p>I pray that God Almighty will greatly enrich your life as you fellowship with us.</p>
                    <span>Prof. Adeyinka Sobowale · Presiding Pastor</span>
                </div>
            </div>
            <div class="lg:col-span-6">
                <div class="home-image-frame">
                    @if($sliders->isNotEmpty())
                        @foreach($sliders as $slider)
                            <img src="{{ $slider->image_path ? asset('storage/'.$slider->image_path) : $slider->image_url }}" alt="{{ $slider->title }}" class="home-slide {{ $loop->first ? 'is-active' : '' }}">
                        @endforeach
                    @else
                        <img src="{{ asset('lead_pastor.jpg') }}" alt="Firebrand Christian Life Ministry" class="home-slide is-active">
                    @endif
                    <div class="home-image-caption"><i class="fas fa-clock"></i><span>Sunday worship · 9:00 AM</span></div>
                </div>
                @if($sliders->count() > 1)
                    <div class="home-slider-controls" aria-label="Slider controls">
                        @foreach($sliders as $slider)<button class="{{ $loop->first ? 'is-active' : '' }}" aria-label="Show slide {{ $loop->iteration }}"></button>@endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="home-links">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="home-section-heading"><p>Discover FCLM</p><h2>There is a place for you here.</h2></div>
            <div class="grid md:grid-cols-3 gap-px bg-stone-200 border border-stone-200 rounded-xl overflow-hidden">
                <a href="{{ route('programmes') }}" class="home-link-card"><i class="fas fa-church"></i><div><h3>Gather with us</h3><p>Services, prayer meetings, and spiritual growth programmes.</p></div><span>01 <i class="fas fa-arrow-up-right-from-square"></i></span></a>
                <a href="{{ route('publications') }}" class="home-link-card"><i class="fas fa-book-open"></i><div><h3>Grow in the Word</h3><p>Free messages, tracts, devotionals, and helpful resources.</p></div><span>02 <i class="fas fa-arrow-up-right-from-square"></i></span></a>
                <a href="{{ route('donation') }}" class="home-link-card"><i class="fas fa-hand-holding-heart"></i><div><h3>Partner with us</h3><p>Support the work of the ministry and our communities.</p></div><span>03 <i class="fas fa-arrow-up-right-from-square"></i></span></a>
            </div>
        </div>
    </section>

    <section class="home-mission">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-14 items-start">
            <div><p class="home-kicker"><span></span> Our purpose</p><h2>Helping people live out their God-given purpose.</h2></div>
            <div class="home-mission-copy"><p>We are a Christ-centred community committed to love, compassion, discipleship, and the transforming power of God.</p><ul><li>Making disciples who express love and God’s power in everyday life.</li><li>Equipping Christian workers and raising leaders of character.</li><li>Serving communities through churches, schools, hospitals, and help centres.</li></ul><a href="{{ route('about') }}">Learn about our ministry <i class="fas fa-arrow-right"></i></a></div>
        </div>
    </section>

    <section class="home-cta"><div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row md:items-center justify-between gap-6"><div><p>Come as you are</p><h2>We would love to welcome you.</h2></div><a href="{{ route('contact') }}">Plan your visit <i class="fas fa-arrow-right"></i></a></div></section>
</main>

<style>
.home-hero{padding:7.5rem 0 6rem;background:#fcfcfb}.home-kicker{display:flex;align-items:center;gap:.65rem;text-transform:uppercase;letter-spacing:.13em;font-size:.72rem;font-weight:700;color:#b45309}.home-kicker span{display:inline-block;width:2rem;height:1px;background:currentColor}.home-hero h1{font-size:clamp(3.3rem,7vw,6.5rem);letter-spacing:-.075em;line-height:.93;margin:1.35rem 0;color:#172033;font-weight:700}.home-hero h1 em{font-family:Georgia,serif;color:#c2410c;font-weight:400}.home-intro{font-size:1.18rem;line-height:1.75;max-width:35rem;color:#526075}.home-primary,.home-secondary{display:inline-flex;align-items:center;gap:.7rem;padding:.9rem 1.2rem;border-radius:.45rem;font-size:.9rem;font-weight:700}.home-primary{background:#172033;color:#fff}.home-primary:hover{background:#c2410c}.home-secondary{border:1px solid #d7d9dd;color:#172033}.home-note{margin-top:4.5rem;max-width:28rem;border-top:1px solid #dedbd4;padding-top:1.25rem;position:relative}.home-note-mark{position:absolute;right:0;top:.35rem;font:4rem/1 Georgia;color:#e7e1d7}.home-note p{font:italic 1rem/1.6 Georgia;color:#334155;max-width:22rem}.home-note span{font-size:.76rem;font-weight:700;color:#64748b}.home-image-frame{height:clamp(360px,52vw,580px);overflow:hidden;border-radius:1rem;background:#e8e8e3;position:relative}.home-slide{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;opacity:0;transition:opacity .7s ease}.home-slide.is-active{opacity:1}.home-image-caption{position:absolute;left:1rem;bottom:1rem;padding:.75rem 1rem;background:rgba(255,255,255,.92);backdrop-filter:blur(8px);border-radius:.4rem;font-size:.78rem;font-weight:700;color:#172033;display:flex;gap:.5rem;align-items:center}.home-image-caption i{color:#c2410c}.home-slider-controls{display:flex;gap:.45rem;margin-top:1rem}.home-slider-controls button{width:2rem;height:2px;background:#cbd5e1;border:0}.home-slider-controls button.is-active{background:#c2410c}.home-links{padding:6rem 0;background:#f3f4f1}.home-section-heading{max-width:38rem;margin-bottom:2.5rem}.home-section-heading p,.home-cta p{font-size:.72rem;text-transform:uppercase;letter-spacing:.13em;font-weight:700;color:#b45309}.home-section-heading h2,.home-mission h2,.home-cta h2{font-size:clamp(2.2rem,4vw,3.6rem);letter-spacing:-.055em;line-height:1.02;font-weight:700;color:#172033;margin-top:.7rem}.home-link-card{background:#fff;padding:2rem;min-height:250px;display:flex;flex-direction:column;gap:1.5rem;color:#172033}.home-link-card:hover{background:#172033;color:#fff}.home-link-card>i{font-size:1.35rem;color:#c2410c}.home-link-card h3{font-size:1.35rem;font-weight:700;letter-spacing:-.035em}.home-link-card p{font-size:.9rem;line-height:1.6;color:#64748b;margin-top:.5rem}.home-link-card:hover p{color:#dbe2ea}.home-link-card span{margin-top:auto;display:flex;justify-content:space-between;font-size:.75rem;font-weight:700}.home-mission{padding:7rem 0;background:#fff}.home-mission-copy>p{font:1.3rem/1.65 Georgia;color:#334155}.home-mission ul{margin:2rem 0;border-top:1px solid #e5e7eb}.home-mission li{padding:1rem 0;border-bottom:1px solid #e5e7eb;color:#475569;font-size:.94rem}.home-mission li::before{content:'—';color:#c2410c;margin-right:.6rem}.home-mission-copy>a{color:#c2410c;font-size:.9rem;font-weight:700}.home-cta{padding:4.5rem 0;background:#172033;color:#fff}.home-cta h2{color:#fff}.home-cta a{background:#fff;color:#172033;padding:1rem 1.25rem;border-radius:.45rem;font-weight:700;font-size:.9rem;white-space:nowrap}.home-cta a i{margin-left:.5rem}@media(max-width:1023px){.home-hero{padding-top:5.5rem}.home-note{margin-top:2.5rem}.home-image-frame{margin-top:1rem}}@media(max-width:640px){.home-hero h1{font-size:3.4rem}.home-links,.home-mission{padding:4rem 0}.home-link-card{min-height:0}}
</style>
<script>
document.addEventListener('DOMContentLoaded', () => { const slides=[...document.querySelectorAll('.home-slide')], buttons=[...document.querySelectorAll('.home-slider-controls button')]; if(slides.length<2)return; let current=0; const show=index=>{slides[current].classList.remove('is-active');buttons[current]?.classList.remove('is-active');current=index;slides[current].classList.add('is-active');buttons[current]?.classList.add('is-active')}; buttons.forEach((button,index)=>button.addEventListener('click',()=>show(index)));setInterval(()=>show((current+1)%slides.length),5000); });
</script>
@endsection
