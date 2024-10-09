<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<script src="https://cdn.tailwindcss.com"></script>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @vite('resources/css/app.css')
  <title>SHOGGY</title>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>

</style>
<!-- <body class="bg-gradient-to-b from-orange-200 to-red-300 bg-no-repeat"> -->

<body class="flex flex-col min-h-screen">
  <div class="">
    <div class="">
      <div class="">
        <header class="">
          @include("layouts.navigation")
        </header>
        <main></main>