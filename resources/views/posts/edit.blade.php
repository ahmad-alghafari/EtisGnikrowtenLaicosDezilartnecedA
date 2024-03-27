@extends('livewire.layouts.app')

@section('content')
    <h1>Edit Post</h1>

        @csrf
        @method('PUT')
<form method="POST" >
    <label for="text">Text:</label>
        <div>
            <label for="text">Text:</label>
            <input type="text" name="text" id="text" value="{{ $post->text }}">
        </div>

        <button type="submit">Update Post</button>
</form>

@endsection
<!-- edit modal -->

<!-- edit modal end -->

{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <title>Social - Network, Community and Event Theme</title>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="author" content="Webestica.com">--}}
{{--    <meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">--}}
{{--    <script>--}}
{{--        const storedTheme = localStorage.getItem('theme')--}}

{{--        const getPreferredTheme = () => {--}}
{{--            if (storedTheme) {--}}
{{--                return storedTheme--}}
{{--            }--}}
{{--            return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'--}}
{{--        }--}}

{{--        const setTheme = function (theme) {--}}
{{--            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {--}}
{{--                document.documentElement.setAttribute('data-bs-theme', 'dark')--}}
{{--            } else {--}}
{{--                document.documentElement.setAttribute('data-bs-theme', theme)--}}
{{--            }--}}
{{--        }--}}

{{--        setTheme(getPreferredTheme())--}}

{{--        window.addEventListener('DOMContentLoaded', () => {--}}
{{--            var el = document.querySelector('.theme-icon-active');--}}
{{--            if(el != 'undefined' && el != null) {--}}
{{--                const showActiveTheme = theme => {--}}
{{--                    const activeThemeIcon = document.querySelector('.theme-icon-active use')--}}
{{--                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)--}}
{{--                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')--}}

{{--                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {--}}
{{--                        element.classList.remove('active')--}}
{{--                    })--}}

{{--                    btnToActive.classList.add('active')--}}
{{--                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)--}}
{{--                }--}}

{{--                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {--}}
{{--                    if (storedTheme !== 'light' || storedTheme !== 'dark') {--}}
{{--                        setTheme(getPreferredTheme())--}}
{{--                    }--}}
{{--                })--}}

{{--                showActiveTheme(getPreferredTheme())--}}

{{--                document.querySelectorAll('[data-bs-theme-value]')--}}
{{--                    .forEach(toggle => {--}}
{{--                        toggle.addEventListener('click', () => {--}}
{{--                            const theme = toggle.getAttribute('data-bs-theme-value')--}}
{{--                            localStorage.setItem('theme', theme)--}}
{{--                            setTheme(theme)--}}
{{--                            showActiveTheme(theme)--}}
{{--                        })--}}
{{--                    })--}}

{{--            }--}}
{{--        })--}}

{{--    </script>--}}


{{--   <style>--}}
{{--       .modal-content {--}}
{{--           position: relative;--}}
{{--           display: -webkit-box;--}}
{{--           display: -ms-flexbox;--}}
{{--           display: flex;--}}
{{--           -webkit-box-orient: vertical;--}}
{{--           -webkit-box-direction: normal;--}}
{{--           -ms-flex-direction: column;--}}
{{--           flex-direction: column;--}}
{{--           width: 100%;--}}
{{--           color: var(--bs-modal-color);--}}
{{--           pointer-events: auto;--}}
{{--           background-color: var(--bs-modal-bg);--}}
{{--           background-clip: padding-box;--}}
{{--           border: var(--bs-modal-border-width) solid var(--bs-modal-border-color);--}}
{{--           border-radius: var(--bs-modal-border-radius);--}}
{{--           outline: 0;--}}
{{--       }--}}
{{--       .modal-header {--}}
{{--           display: -webkit-box;--}}
{{--           display: -ms-flexbox;--}}
{{--           display: flex;--}}
{{--           -ms-flex-negative: 0;--}}
{{--           flex-shrink: 0;--}}
{{--           -webkit-box-align: center;--}}
{{--           -ms-flex-align: center;--}}
{{--           align-items: center;--}}
{{--           -webkit-box-pack: justify;--}}
{{--           -ms-flex-pack: justify;--}}
{{--           justify-content: space-between;--}}
{{--           padding: var(--bs-modal-header-padding);--}}
{{--           border-bottom: var(--bs-modal-header-border-width) solid var(--bs-modal-header-border-color);--}}
{{--           border-top-left-radius: var(--bs-modal-inner-border-radius);--}}
{{--           border-top-right-radius: var(--bs-modal-inner-border-radius);--}}
{{--       }--}}
{{--       .modal-header .btn-close {--}}
{{--           padding: calc(var(--bs-modal-header-padding-y) * 0.5) calc(var(--bs-modal-header-padding-x) * 0.5);--}}
{{--           margin: calc(-0.5 * var(--bs-modal-header-padding-y)) calc(-0.5 * var(--bs-modal-header-padding-x)) calc(-0.5 * var(--bs-modal-header-padding-y)) auto;--}}
{{--       }--}}

{{--       .modal-title {--}}
{{--           margin-bottom: 0;--}}
{{--           line-height: var(--bs-modal-title-line-height);--}}
{{--       }--}}

{{--       .modal-body {--}}
{{--           position: relative;--}}
{{--           -webkit-box-flex: 1;--}}
{{--           -ms-flex: 1 1 auto;--}}
{{--           flex: 1 1 auto;--}}
{{--           padding: var(--bs-modal-padding);--}}
{{--       }--}}

{{--       .modal-footer {--}}
{{--           display: -webkit-box;--}}
{{--           display: -ms-flexbox;--}}
{{--           display: flex;--}}
{{--           -ms-flex-negative: 0;--}}
{{--           flex-shrink: 0;--}}
{{--           -ms-flex-wrap: wrap;--}}
{{--           flex-wrap: wrap;--}}
{{--           -webkit-box-align: center;--}}
{{--           -ms-flex-align: center;--}}
{{--           align-items: center;--}}
{{--           -webkit-box-pack: end;--}}
{{--           -ms-flex-pack: end;--}}
{{--           justify-content: flex-end;--}}
{{--           padding: calc(var(--bs-modal-padding) - var(--bs-modal-footer-gap) * 0.5);--}}
{{--           background-color: var(--bs-modal-footer-bg);--}}
{{--           border-top: var(--bs-modal-footer-border-width) solid var(--bs-modal-footer-border-color);--}}
{{--           border-bottom-right-radius: var(--bs-modal-inner-border-radius);--}}
{{--           border-bottom-left-radius: var(--bs-modal-inner-border-radius);--}}
{{--       }--}}
{{--       .modal-footer > * {--}}
{{--           margin: calc(var(--bs-modal-footer-gap) * 0.5);--}}
{{--       }--}}

{{--       @media (min-width: 576px) {--}}
{{--           .modal {--}}
{{--               --bs-modal-margin: 1.75rem;--}}
{{--               --bs-modal-box-shadow: var(--bs-box-shadow);--}}
{{--           }--}}
{{--           .modal-dialog {--}}
{{--               max-width: var(--bs-modal-width);--}}
{{--               margin-right: auto;--}}
{{--               margin-left: auto;--}}
{{--           }--}}
{{--           .modal-sm {--}}
{{--               --bs-modal-width: 300px;--}}
{{--           }--}}
{{--       }--}}
{{--       @media (min-width: 992px) {--}}
{{--           .modal-lg,--}}
{{--           .modal-xl {--}}
{{--               --bs-modal-width: 800px;--}}
{{--           }--}}
{{--       }--}}
{{--       @media (min-width: 1200px) {--}}
{{--           .modal-xl {--}}
{{--               --bs-modal-width: 1140px;--}}
{{--           }--}}
{{--       }--}}
{{--       .modal-fullscreen {--}}
{{--           width: 100vw;--}}
{{--           max-width: none;--}}
{{--           height: 100%;--}}
{{--           margin: 0;--}}
{{--       }--}}
{{--       .modal-fullscreen .modal-content {--}}
{{--           height: 100%;--}}
{{--           border: 0;--}}
{{--           border-radius: 0;--}}
{{--       }--}}
{{--       .modal-fullscreen .modal-header,--}}
{{--       .modal-fullscreen .modal-footer {--}}
{{--           border-radius: 0;--}}
{{--       }--}}
{{--       .modal-fullscreen .modal-body {--}}
{{--           overflow-y: auto;--}}
{{--       }--}}

{{--       @media (max-width: 575.98px) {--}}
{{--           .modal-fullscreen-sm-down {--}}
{{--               width: 100vw;--}}
{{--               max-width: none;--}}
{{--               height: 100%;--}}
{{--               margin: 0;--}}
{{--           }--}}
{{--           .modal-fullscreen-sm-down .modal-content {--}}
{{--               height: 100%;--}}
{{--               border: 0;--}}
{{--               border-radius: 0;--}}
{{--           }--}}
{{--           .modal-fullscreen-sm-down .modal-header,--}}
{{--           .modal-fullscreen-sm-down .modal-footer {--}}
{{--               border-radius: 0;--}}
{{--           }--}}
{{--           .modal-fullscreen-sm-down .modal-body {--}}
{{--               overflow-y: auto;--}}
{{--           }--}}
{{--       }--}}
{{--       @media (max-width: 767.98px) {--}}
{{--           .modal-fullscreen-md-down {--}}
{{--               width: 100vw;--}}
{{--               max-width: none;--}}
{{--               height: 100%;--}}
{{--               margin: 0;--}}
{{--           }--}}
{{--           .modal-fullscreen-md-down .modal-content {--}}
{{--               height: 100%;--}}
{{--               border: 0;--}}
{{--               border-radius: 0;--}}
{{--           }--}}
{{--           .modal-fullscreen-md-down .modal-header,--}}
{{--           .modal-fullscreen-md-down .modal-footer {--}}
{{--               border-radius: 0;--}}
{{--           }--}}
{{--           .modal-fullscreen-md-down .modal-body {--}}
{{--               overflow-y: auto;--}}
{{--           }--}}
{{--       }--}}
{{--       @media (max-width: 991.98px) {--}}
{{--           .modal-fullscreen-lg-down {--}}
{{--               width: 100vw;--}}
{{--               max-width: none;--}}
{{--               height: 100%;--}}
{{--               margin: 0;--}}
{{--           }--}}
{{--           .modal-fullscreen-lg-down .modal-content {--}}
{{--               height: 100%;--}}
{{--               border: 0;--}}
{{--               border-radius: 0;--}}
{{--           }--}}
{{--           .modal-fullscreen-lg-down .modal-header,--}}
{{--           .modal-fullscreen-lg-down .modal-footer {--}}
{{--               border-radius: 0;--}}
{{--           }--}}
{{--           .modal-fullscreen-lg-down .modal-body {--}}
{{--               overflow-y: auto;--}}
{{--           }--}}
{{--       }--}}
{{--       @media (max-width: 1199.98px) {--}}
{{--           .modal-fullscreen-xl-down {--}}
{{--               width: 100vw;--}}
{{--               max-width: none;--}}
{{--               height: 100%;--}}
{{--               margin: 0;--}}
{{--           }--}}
{{--           .modal-fullscreen-xl-down .modal-content {--}}
{{--               height: 100%;--}}
{{--               border: 0;--}}
{{--               border-radius: 0;--}}
{{--           }--}}
{{--           .modal-fullscreen-xl-down .modal-header,--}}
{{--           .modal-fullscreen-xl-down .modal-footer {--}}
{{--               border-radius: 0;--}}
{{--           }--}}
{{--           .modal-fullscreen-xl-down .modal-body {--}}
{{--               overflow-y: auto;--}}
{{--           }--}}
{{--       }--}}
{{--       @media (max-width: 1399.98px) {--}}
{{--           .modal-fullscreen-xxl-down {--}}
{{--               width: 100vw;--}}
{{--               max-width: none;--}}
{{--               height: 100%;--}}
{{--               margin: 0;--}}
{{--           }--}}
{{--           .modal-fullscreen-xxl-down .modal-content {--}}
{{--               height: 100%;--}}
{{--               border: 0;--}}
{{--               border-radius: 0;--}}
{{--           }--}}
{{--           .modal-fullscreen-xxl-down .modal-header,--}}
{{--           .modal-fullscreen-xxl-down .modal-footer {--}}
{{--               border-radius: 0;--}}
{{--           }--}}
{{--           .modal-fullscreen-xxl-down .modal-body {--}}
{{--               overflow-y: auto;--}}
{{--           }--}}
{{--       }--}}
{{--   </style>--}}

{{--</head>--}}
{{--<body>--}}

