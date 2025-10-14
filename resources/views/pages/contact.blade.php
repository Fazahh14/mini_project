@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
<div class="hubungi-kami-container">
    <section class="hubungi-kami-section">  
        <div style="margin-top: 60px;">
            <div class="container" style="margin-left: 0; padding-left: 80px;">
                <div class="text-start" style="max-width: 700px;">
                    <h2 style="font-size: 2.3rem; font-weight: 700; margin-bottom: 50px;">Hubungi Kami</h2>

                    <p style="color: #000; font-size: 1.3rem; line-height: 1.7; margin-bottom: 5px;">
                        Jika Anda memiliki pertanyaan atau mengalami kendala terkait tiket, silakan hubungi kami melalui kontak yang tersedia.
                    </p>
                    <br>
                    <p style="color: #000; font-size: 1.3rem; line-height: 1.7;">
                        Kami siap membantu Anda sebaik mungkin.
                    </p>

                    <div style="margin-top: 60px;">
                        <!-- WhatsApp -->
                        <div style="display: flex; align-items: center; margin-bottom: 12px; font-size: 1.3rem;">
                            <i class="bi bi-whatsapp" style="font-size: 1.50rem; margin-right: 10px;"></i>
                            <a href="https://wa.me/6282317759568" target="_blank" style="font-weight: 600; color: #000; text-decoration: none;">
                                +62 823-1775-9568
                            </a>
                        </div>

                        <!-- Email (langsung ke Gmail Compose) -->
                        <div style="display: flex; align-items: center; margin-bottom: 20px; font-size: 1.3rem;">
                            <i class="bi bi-envelope" style="font-size: 1.50rem; margin-right: 10px;"></i>
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=marisasrihartati15@gmail.com" target="_blank" style="font-weight: 600; color: #000; text-decoration: none;">
                                marisasrihartati15@gmail.com
                            </a>
                        </div>

                        <!-- Social Media -->
                        <div style="margin-top: 150px;">
                            <div style="display: flex; align-items: center; gap: 30px; margin-top: 10px;">
                                <!-- Ganti '#' dengan link profil asli -->
                                <a href="https://www.instagram.com/marisaas_?igsh=MXZzN2tlY3ZvbzhuYg==" target="_blank" class="text-dark" style="font-size: 1.4rem; color: #000;">
                                    <i class="bi bi-instagram"></i>
                                </a>
                                <a href="https://www.tiktok.com/@marisarisasaa?_t=ZS-90N3Ih97q5K&_r=1/@marisarisasaa" target="_blank" class="text-dark" style="font-size: 1.4rem; color: #000;">
                                    <i class="bi bi-tiktok"></i>
                                </a>
                                <a href="https://youtube.com/@marisa-b8z8l?si=aNM89WffNmI-91Vb" target="_blank" class="text-dark" style="font-size: 1.4rem; color: #000;">
                                    <i class="bi bi-youtube"></i>
                                </a>
                                <a href="https://www.facebook.com/share/1FphJpK6jL/" target="_blank" class="text-dark" style="font-size: 1.4rem; color: #000;">
                                    <i class="bi bi-facebook"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
