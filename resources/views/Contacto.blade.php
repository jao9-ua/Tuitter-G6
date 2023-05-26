@extends('layouts.master')

@section('content')
    <div class="center" style="display: flex; flex-direction: column; align-items: center;">
        <h2 style="margin-top: 0;">¡Contáctanos!</h2>

        <div style="display: flex; align-items: center; flex-wrap: wrap;">
            <p style="margin-right: 10px; margin-bottom: 0;">Para contactarnos, envía un correo electrónico a:</p>
        </div>

        <div>
            <p id="email-address" style="margin-top: 0;">tuinteractiontool@gmail.com             
            <button class="copy-btn" onclick="copyToClipboard()" style="background-color: white; margin-bottom: 5px;">
                <img src="{{ asset('images/logo-clipboard.jpeg') }}" alt="Clipboard" style="height: 20px;">
            </button>
        </p>
        </div>

        

        <div class="logo-container" style="display: flex; justify-content: center;">
            <div>
                <a href="https://www.facebook.com" target="_blank">
                    <img src="{{ asset('images/logo-facebook.png') }}" alt="Facebook" style="height: 75px;">
                </a>
            </div>
            
            <div style="margin-left: 20px;">
                <a href="https://www.tiktok.com" target="_blank">
                    <img src="{{ asset('images/logo-tiktok.jpg') }}" alt="TikTok" style="height: 75px;">
                </a>
            </div>
           
            <div>
                <a href="https://www.gmail.com" target="_blank">
                    <img src="{{ asset('images/gmail-logo.png') }}" alt="Gmail" style="height: 75px;">
                </a>
            </div>
            
            <div>
                <a href="https://www.instagram.com" target="_blank">
                    <img src="{{ asset('images/logo-instagram.png') }}" alt="Instagram" style="height: 75px;">
                </a>
            </div>
        </div>

        <script>
            function copyToClipboard() {
                var emailAddress = document.getElementById("email-address");
                var tempInput = document.createElement("input");
                tempInput.value = emailAddress.textContent;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand("copy");
                document.body.removeChild(tempInput);
            }
        </script>
    </div>
@endsection