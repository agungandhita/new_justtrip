<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<div class="relative flex min-h-screen flex-col overflow-x-hidden">
<!-- Top Navigation -->
<nav class="fixed top-0 left-0 w-full z-50 border-b border-slate-200 dark:border-slate-800 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md flex justify-between items-center px-8 py-4 text-sm font-medium">
<!-- Logo -->
<div class="flex items-center gap-3">
<div class="w-8 h-8 bg-primary rounded-md flex items-center justify-center">
<span class="material-symbols-outlined text-secondary">flight_takeoff</span>
</div>
<span class="text-xl font-bold text-secondary dark:text-white tracking-tight">Solaris Travel</span>
</div>
<!-- Nav Links -->
<div class="hidden md:flex items-center gap-8">
<a class="text-secondary dark:text-white font-semibold" href="#">Dashboard</a>
<a class="text-slate-500 hover:text-secondary dark:hover:text-white transition-colors" href="#">Orders</a>
<a class="text-slate-500 hover:text-secondary dark:hover:text-white transition-colors" href="#">Customers</a>
<a class="text-slate-500 hover:text-secondary dark:hover:text-white transition-colors" href="#">Settings</a>
</div>
<!-- CTA -->
<div class="flex items-center gap-4">
<span class="material-symbols-outlined text-slate-500 cursor-pointer hover:text-secondary dark:hover:text-white transition-colors">notifications</span>
<div class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden">
<img alt="Admin User" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCVAAZ3CjbQFGXOhablvCoI2qnowhfl7GS0t13jVkRyzWzq9xSvIl4IQ-IszQAPqPFcapjUaRb_ZFIdbg7YksbmJmpUTHqwl6CGeLd7vSjLS72LUpWeZDyn2HslpBDJ6NqQystuZQSu6XDGpImRIXZtI3DqkOaof6-DZurB0sysbHaIuIWHWWJcR8puHMInRFgwrgtgej9m13RpE0lL0-l99sg_eZtOgkIGBagO2PLj8G8-crXp-HZvVRo6oPtqbb_ylaBCWXbWDOkr"/>
</div>
</div>
</nav>
<main class="flex-1 pt-24 pb-12">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="mb-8 flex items-center justify-between">
<div>
<h1 class="text-2xl font-bold text-secondary dark:text-white">Order Management</h1>
<p class="text-sm text-slate-500 mt-1">View and manage customer orders and payments.</p>
</div>
<button class="bg-secondary text-white px-4 py-2 rounded-md hover:bg-secondary/90 transition-colors flex items-center gap-2 text-sm font-medium">
<span class="material-symbols-outlined text-sm">filter_list</span>
                        Filter
                    </button>
</div>
<!-- Order Table -->
<div class="bg-white dark:bg-slate-800 shadow-sm border border-slate-200 dark:border-slate-700 rounded-lg overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700 text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 font-semibold">
<th class="px-6 py-4">Order ID</th>
<th class="px-6 py-4">Customer</th>
<th class="px-6 py-4">Package</th>
<th class="px-6 py-4">Total</th>
<th class="px-6 py-4">Payment Status</th>
<th class="px-6 py-4 text-right">Action</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-200 dark:divide-slate-700 text-sm">
<!-- Row 1: Pending Verification -->
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
<td class="px-6 py-4 font-medium text-secondary dark:text-white">#ORD-0941</td>
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">AJ</div>
<div>
<div class="font-medium text-secondary dark:text-white">Ahmad Fauzi</div>
<div class="text-xs text-slate-500">ahmad@example.com</div>
</div>
</div>
</td>
<td class="px-6 py-4 text-slate-600 dark:text-slate-300">Bali Paradise 4D3N</td>
<td class="px-6 py-4 font-medium text-secondary dark:text-white">Rp 4.500.000</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400 border border-amber-200 dark:border-amber-800">
                                            Pending Verification
                                        </span>
</td>
<td class="px-6 py-4 text-right">
<div class="flex items-center justify-end gap-2">
<button class="bg-secondary text-white px-3 py-1.5 rounded text-xs font-medium hover:bg-secondary/90 transition-colors">Review Proof</button>
</div>
</td>
</tr>
<!-- Row 2: Currently Reviewing (Expanded State Example) -->
<tr class="bg-blue-50/50 dark:bg-blue-900/10 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors">
<td class="px-6 py-4 font-medium text-secondary dark:text-white">#ORD-0940</td>
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs">SM</div>
<div>
<div class="font-medium text-secondary dark:text-white">Siti Maharani</div>
<div class="text-xs text-slate-500">siti@example.com</div>
</div>
</div>
</td>
<td class="px-6 py-4 text-slate-600 dark:text-slate-300">Japan Sakura Tour</td>
<td class="px-6 py-4 font-medium text-secondary dark:text-white">Rp 15.200.000</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400 border border-amber-200 dark:border-amber-800">
                                            Pending Verification
                                        </span>
</td>
<td class="px-6 py-4 text-right">
<div class="flex items-center justify-end gap-2">
<button class="bg-emerald-600 text-white px-3 py-1.5 rounded text-xs font-medium hover:bg-emerald-700 transition-colors flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">check</span> Approve
                                            </button>
<button class="bg-red-600 text-white px-3 py-1.5 rounded text-xs font-medium hover:bg-red-700 transition-colors flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">close</span> Reject
                                            </button>
</div>
</td>
</tr>
<tr class="bg-blue-50/30 dark:bg-blue-900/5 border-t-0">
<td class="px-6 py-4 pb-6" colspan="6">
<div class="flex gap-6 items-start p-4 bg-white dark:bg-slate-800 rounded-lg border border-blue-100 dark:border-slate-700 shadow-sm">
<div class="w-48 h-auto rounded border border-slate-200 overflow-hidden cursor-pointer hover:opacity-90 transition-opacity">
<img alt="Transfer Receipt" class="w-full h-auto object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCDztoSXR7kqQra7eIlNKyt2W3Z3la1UCZ4KDsbdhxyn0h7adXwX6natX2a8TJjbtTUcH0iwHXXIgbiU-tqROkFI-fL2LUag1QGlIpmdCSjYIFYvBwYUANUEOr0Nn8E6HT4B3Oac8qqQh7jQDDvcFh92vdUt5N6YnjyYbBiCknx_eLEQNBeyDhF_C3Ah5T-pZBrW8XZMdTZmzGpkicXE3ahom0x4Ll_WH2vc5O77a74cslwyZPuozBmFAnLuntHFJxkUWVUaZNfsXI8"/>
</div>
<div class="flex-1 text-sm space-y-3">
<h4 class="font-semibold text-secondary dark:text-white">Payment Details</h4>
<div class="grid grid-cols-2 gap-4">
<div>
<span class="block text-slate-500 text-xs uppercase tracking-wider mb-1">Bank Sender</span>
<span class="font-medium text-slate-800 dark:text-slate-200">BCA - Siti Maharani</span>
</div>
<div>
<span class="block text-slate-500 text-xs uppercase tracking-wider mb-1">Amount Transferred</span>
<span class="font-medium text-slate-800 dark:text-slate-200">Rp 15.200.000</span>
</div>
<div>
<span class="block text-slate-500 text-xs uppercase tracking-wider mb-1">Transfer Date</span>
<span class="font-medium text-slate-800 dark:text-slate-200">12 Oct 2023, 14:30 WIB</span>
</div>
<div>
<span class="block text-slate-500 text-xs uppercase tracking-wider mb-1">Target Account</span>
<span class="font-medium text-slate-800 dark:text-slate-200">Mandiri - Solaris Travel</span>
</div>
</div>
</div>
</div>
</td>
</tr>
<!-- Row 3: Approved -->
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
<td class="px-6 py-4 font-medium text-secondary dark:text-white">#ORD-0935</td>
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-xs">BK</div>
<div>
<div class="font-medium text-secondary dark:text-white">Budi Kusuma</div>
<div class="text-xs text-slate-500">budi.k@example.com</div>
</div>
</div>
</td>
<td class="px-6 py-4 text-slate-600 dark:text-slate-300">Yogyakarta 3D2N</td>
<td class="px-6 py-4 font-medium text-secondary dark:text-white">Rp 2.100.000</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800">
                                            Approved
                                        </span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-slate-400 hover:text-secondary dark:hover:text-white transition-colors">
<span class="material-symbols-outlined">more_vert</span>
</button>
</td>
</tr>
<!-- Row 4: Rejected -->
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors opacity-75">
<td class="px-6 py-4 font-medium text-secondary dark:text-white">#ORD-0932</td>
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center font-bold text-xs">DW</div>
<div>
<div class="font-medium text-secondary dark:text-white">Dian Wulandari</div>
<div class="text-xs text-slate-500">dian.w@example.com</div>
</div>
</div>
</td>
<td class="px-6 py-4 text-slate-600 dark:text-slate-300">Lombok Gili Tour</td>
<td class="px-6 py-4 font-medium text-secondary dark:text-white">Rp 3.800.000</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-100 text-rose-800 dark:bg-rose-900/30 dark:text-rose-400 border border-rose-200 dark:border-rose-800">
                                            Rejected
                                        </span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-slate-400 hover:text-secondary dark:hover:text-white transition-colors">
<span class="material-symbols-outlined">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="px-6 py-4 border-t border-slate-200 dark:border-slate-700 flex items-center justify-between text-sm text-slate-500">
<span>Showing 1 to 4 of 24 entries</span>
<div class="flex items-center gap-2">
<button class="px-3 py-1 rounded border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 disabled:opacity-50" disabled="">Previous</button>
<button class="px-3 py-1 rounded border border-slate-200 dark:border-slate-700 bg-secondary text-white">1</button>
<button class="px-3 py-1 rounded border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800">2</button>
<button class="px-3 py-1 rounded border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800">3</button>
<button class="px-3 py-1 rounded border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800">Next</button>
</div>
</div>
</div>
</div>
</main>
</div>

    </FrontendLayout>
</template>
