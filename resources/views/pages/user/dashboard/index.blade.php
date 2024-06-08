@extends('layouts.app')

@section('content')
    <section class="my-5 dashboard">
        <div class="container">
            <div class="text-left row">
                <div class="mt-4 col-lg-12 col-12 header-wrap">
                    <p class="story">
                        DASHBOARD
                    </p>
                    <h2 class="primary-header ">
                        My Bootcamps
                    </h2>
                </div>
            </div>
            <div class="my-5 row">
                <table class="table">
                    <tbody>
                        @forelse ($checkouts as $checkout)
                            <tr class="align-middle">
                                <td width="18%">
                                    <img src="{{ asset('images/item_bootcamp.png') }}" height="120" alt="">
                                </td>
                                <td>
                                    <p class="mb-2">
                                        <strong>{{ $checkout->camp->title }}</strong>
                                    </p>
                                    <p>
                                        {{ $checkout->created_at->format('F d, Y') }}
                                    </p>
                                </td>
                                <td>
                                    <strong>${{ $checkout->camp->price }}</strong>
                                </td>
                                <td>
                                    @if($checkout->is_paid)
                                        <strong class="text-green">Payment Success</strong>
                                    @else
                                        <strong>Waitng For Payment</strong>
                                    @endif
                                </td>
                                <td>
                                    <a href="https://wa.me/+6285150292253?text=Hi, saya ingin bertanya tentang kelas {{ $checkout->camp->title }}" class="btn btn-primary">
                                        Contact Support
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    <p class="text-center">
                                        No Bootcamp Available
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
