@extends('layouts.app')

@section('title', 'Tentang Kami - Creamy Mood')

@section('content')
<section class="container" style="padding-top: 6rem; padding-bottom: 4rem;">
    <div class="text-center" style="max-width: 800px; margin: 0 auto;">
        <h1 style="font-size: 3rem; margin-bottom: 1.5rem; color: var(--color-dark);">Kisah Creamy Mood</h1>
        <p style="font-size: 1.25rem; line-height: 1.8; color: var(--color-gray);">
            Berawal dari kecintaan kami terhadap perpaduan rasa yang autentik, Creamy Mood lahir untuk menghadirkan minuman yang tidak hanya menyegarkan, tetapi juga mampu membangkitkan senyum di setiap tegukannya. 
        </p>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem; margin-top: 4rem; align-items: center;">
        <div>
            <img src="{{ asset('images/logo.png') }}" alt="Creamy Mood" style="width: 100%; max-width: 400px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); margin: 0 auto; display: block;">
        </div>
        <div>
            <h2 style="font-size: 2rem; margin-bottom: 1rem; color: var(--color-matcha-dark);">Bahan Premium, Rasa Maksimal</h2>
            <p style="margin-bottom: 1.5rem; line-height: 1.7; color: var(--color-gray);">
                Kami percaya bahwa kualitas terbaik berasal dari bahan yang terbaik. Setiap daun matcha dan biji kakao yang kami gunakan dipilih dengan sangat cermat untuk memastikan Anda mendapatkan pengalaman rasa yang kaya, creamy, dan tak terlupakan.
            </p>
            <h2 style="font-size: 2rem; margin-bottom: 1rem; color: var(--color-matcha-dark);">Komitmen Kami</h2>
            <p style="margin-bottom: 1.5rem; line-height: 1.7; color: var(--color-gray);">
                Kepuasan Anda adalah prioritas kami. Kami terus berinovasi dalam meracik minuman yang pas untuk segala suasana—baik saat Anda butuh dorongan energi di pagi hari, atau sekadar ingin bersantai di sore hari.
            </p>
            <h2 style="font-size: 2rem; margin-bottom: 1rem; color: var(--color-matcha-dark);">Temukan Kami</h2>
            <p style="line-height: 1.7; color: var(--color-gray);">
                Ikuti terus perjalanan manis kami, berikan masukan Anda, dan bagikan momen keceriaan dengan menandai akun Instagram kami di 
                <a href="https://instagram.com/creamy._mood" target="_blank" style="color: var(--color-matcha); font-weight: 600; text-decoration: none; border-bottom: 1px dotted currentColor;">@creamy._mood</a>.
            </p>
        </div>
    </div>
</section>
@endsection
