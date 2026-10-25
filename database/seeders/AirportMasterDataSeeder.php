<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirportMasterDataSeeder extends Seeder
{
    public function run()
    {
        // 1. Seed Real Master Perangkat
        DB::table('masterperangkat')->truncate();
        DB::table('masterchecklists')->truncate();
        DB::table('laporan_monitoring')->truncate();
        DB::table('monitoring_perangkat')->truncate();
        DB::table('monitoring_checklists')->truncate();

        $devices = [
            // IT Non Public (Role 2)
            ['id' => 1, 'namaperangkat' => 'Server Core AODB Dell PowerEdge R750', 'role' => '2'],
            ['id' => 2, 'namaperangkat' => 'Storage Area Network Dell EMC Unity 480F', 'role' => '2'],
            ['id' => 3, 'namaperangkat' => 'Workstation Admin FIDS HP Z2 G9', 'role' => '2'],
            ['id' => 4, 'namaperangkat' => 'UPS Modular APC Symmetra PX 40kVA', 'role' => '2'],

            // Data Network (Role 4)
            ['id' => 5, 'namaperangkat' => 'Core Switch Cisco Catalyst 9500 48Y4C', 'role' => '4'],
            ['id' => 6, 'namaperangkat' => 'Distribution Switch Cisco Catalyst 9300 48P', 'role' => '4'],
            ['id' => 7, 'namaperangkat' => 'Access Point Aruba AP-515 Wi-Fi 6', 'role' => '4'],
            ['id' => 8, 'namaperangkat' => 'Router Gateway Cisco ISR 4451-X', 'role' => '4'],

            // IT AUCC / TOC (Role 6)
            ['id' => 9, 'namaperangkat' => 'CCTV PTZ Apron Hikvision DarkFighter DS-2DF8425', 'role' => '6'],
            ['id' => 10, 'namaperangkat' => 'FIDS Display Samsung QM55R 4K Keberangkatan', 'role' => '6'],
            ['id' => 11, 'namaperangkat' => 'Public Address Controller Bosch Praesideo', 'role' => '6'],
            ['id' => 12, 'namaperangkat' => 'Baggage Handling Scanner Rapiscan 620XR', 'role' => '6'],
        ];

        DB::table('masterperangkat')->insert($devices);

        // 2. Seed Real Checklists for each device
        $checklists = [
            // Server Core AODB
            ['idperangkat' => 1, 'keterangan' => 'Pengecekan Redundancy Dual Power Supply AC', 'role' => '2'],
            ['idperangkat' => 1, 'keterangan' => 'Pemeriksaan Status RAID Disk Drive (Healthy)', 'role' => '2'],
            ['idperangkat' => 1, 'keterangan' => 'Monitoring Suhu CPU Chassis (< 55°C)', 'role' => '2'],
            ['idperangkat' => 1, 'keterangan' => 'Verifikasi Layanan Oracle Database Service Active', 'role' => '2'],

            // Storage Area Network
            ['idperangkat' => 2, 'keterangan' => 'Pemeriksaan Status Controller A & B Active/Active', 'role' => '2'],
            ['idperangkat' => 2, 'keterangan' => 'Verifikasi Throughput Fibre Channel 16 Gbps', 'role' => '2'],
            ['idperangkat' => 2, 'keterangan' => 'Monitoring Utilisasi Pool Storage (< 80%)', 'role' => '2'],

            // Workstation Admin
            ['idperangkat' => 3, 'keterangan' => 'Pembersihan Ventilasi Kipas & Debu Internal', 'role' => '2'],
            ['idperangkat' => 3, 'keterangan' => 'Verifikasi Update Security Patch & Antivirus', 'role' => '2'],

            // UPS Modular
            ['idperangkat' => 4, 'keterangan' => 'Uji Self-Test Baterai Cadangan Listrik', 'role' => '2'],
            ['idperangkat' => 4, 'keterangan' => 'Pengecekan Voltase Input & Output Stabil 220V', 'role' => '2'],

            // Core Switch
            ['idperangkat' => 5, 'keterangan' => 'Pengecekan Port Uplink 100G ke Data Center', 'role' => '4'],
            ['idperangkat' => 5, 'keterangan' => 'Verifikasi BGP Peering & Routing Table', 'role' => '4'],
            ['idperangkat' => 5, 'keterangan' => 'Monitoring Utilisasi Port & Suhu SFP Module', 'role' => '4'],

            // Distribution Switch
            ['idperangkat' => 6, 'keterangan' => 'Pengecekan Konsumsi Daya PoE untuk AP & IP Cam', 'role' => '4'],
            ['idperangkat' => 6, 'keterangan' => 'Verifikasi Link Aggregation (LACP) Port-Channel', 'role' => '4'],
            ['idperangkat' => 6, 'keterangan' => 'Pembersihan Rak Server & Kerapihan Patch Cord', 'role' => '4'],

            // Access Point
            ['idperangkat' => 7, 'keterangan' => 'Pengukuran Kuat Sinyal RSSI Publik (> -65 dBm)', 'role' => '4'],
            ['idperangkat' => 7, 'keterangan' => 'Verifikasi Client Association & Throughput Radio', 'role' => '4'],
            ['idperangkat' => 7, 'keterangan' => 'Pemeriksaan Indikator LED PoE & Uplink Status', 'role' => '4'],

            // Router Gateway
            ['idperangkat' => 8, 'keterangan' => 'Pemeriksaan Link WAN Primary & Secondary Telkom', 'role' => '4'],
            ['idperangkat' => 8, 'keterangan' => 'Verifikasi IPsec VPN Tunnel ke Head Office AP2', 'role' => '4'],

            // CCTV PTZ Apron
            ['idperangkat' => 9, 'keterangan' => 'Uji Presisi Gerak Pan-Tilt-Zoom (PTZ) 360°', 'role' => '6'],
            ['idperangkat' => 9, 'keterangan' => 'Pemeriksaan Kualitas Gambar Siang & Malam (IR)', 'role' => '6'],
            ['idperangkat' => 9, 'keterangan' => 'Pembersihan Kaca Lensa Kamera dari Debu & Jamur', 'role' => '6'],
            ['idperangkat' => 9, 'keterangan' => 'Verifikasi Frame Rate Stream RTSP ke Milestone VMS', 'role' => '6'],

            // FIDS Display
            ['idperangkat' => 10, 'keterangan' => 'Pemeriksaan Brightness, Kontras & Panel Display', 'role' => '6'],
            ['idperangkat' => 10, 'keterangan' => 'Verifikasi Real-time Sync Jadwal Penerbangan', 'role' => '6'],
            ['idperangkat' => 10, 'keterangan' => 'Pengecekan Suhu Mini PC Player & Konektor HDMI', 'role' => '6'],

            // Public Address
            ['idperangkat' => 11, 'keterangan' => 'Uji Suara Emergency Chime Zona Boarding Gate 1-12', 'role' => '6'],
            ['idperangkat' => 11, 'keterangan' => 'Pemeriksaan Indikator Power Supply 24V DC Backup', 'role' => '6'],

            // Baggage Handling Scanner
            ['idperangkat' => 12, 'keterangan' => 'Verifikasi Integrasi Data Tag Bagasi BHS Central', 'role' => '6'],
            ['idperangkat' => 12, 'keterangan' => 'Pengecekan Komunikasi Serial Controller Scanner', 'role' => '6'],
        ];

        DB::table('masterchecklists')->insert($checklists);

        // 3. Seed Realistic Monitoring Reports
        $reports = [
            [
                'id' => 1,
                'tanggal' => '2024-10-24',
                'shift' => 'Pagi',
                'divisi' => 'Data Network',
                'perangkat' => 'Core Switch Cisco Catalyst 9500 48Y4C',
                'area' => 'Server Room Lantai 2 Terminal 3',
                'jam' => '08:00 - 09:30',
                'user' => 'Bryan Bonifasius',
                'ttd1' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=',
                'ttd2' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'tanggal' => '2024-10-24',
                'shift' => 'Siang',
                'divisi' => 'IT AUCC/TOC',
                'perangkat' => 'CCTV PTZ Apron Hikvision DarkFighter DS-2DF8425',
                'area' => 'Tower Apron Gate 5 Terminal 3',
                'jam' => '13:00 - 14:15',
                'user' => 'Nathan',
                'ttd1' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=',
                'ttd2' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'tanggal' => '2024-10-25',
                'shift' => 'Pagi',
                'divisi' => 'IT Non Public',
                'perangkat' => 'Server Core AODB Dell PowerEdge R750',
                'area' => 'Data Center Gedung 600 Bandara Soetta',
                'jam' => '09:00 - 10:30',
                'user' => 'Devin',
                'ttd1' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=',
                'ttd2' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'tanggal' => '2024-10-25',
                'shift' => 'Siang',
                'divisi' => 'IT AUCC/TOC',
                'perangkat' => 'FIDS Display Samsung QM55R 4K Keberangkatan',
                'area' => 'Check-in Island C Terminal 3',
                'jam' => '14:00 - 15:00',
                'user' => 'Ihsan',
                'ttd1' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=',
                'ttd2' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('laporan_monitoring')->insert($reports);

        // 4. Seed Monitoring Perangkat records
        $monPerangkat = [
            [
                'id' => 1,
                'idperangkat' => 5,
                'idlaporanmonitoring' => 1,
                'lokasi' => 'Rak R-04 Server Room Lantai 2',
                'catatan' => 'Suhu ruang 19.5°C, pendingin presisi PAC normal, port uplink 100G stabil tanpa error counter.',
                'foto' => '1708484202_WhatisNetworkSwitch_TypesofNetworkSwitchesExplained.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'idperangkat' => 9,
                'idlaporanmonitoring' => 2,
                'lokasi' => 'Pole P-12 Apron Terminal 3',
                'catatan' => 'Lensa dibersihkan dari debu, mekanik PTZ responsif, night vision IR berfungsi optimal.',
                'foto' => '1708479248_RevlightSecurityCCTVCamera-OfficeView.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'idperangkat' => 1,
                'idlaporanmonitoring' => 3,
                'lokasi' => 'Rak AODB Data Center Gedung 600',
                'catatan' => 'Semua drive SAS RAID-10 status Optimal, RAM utilization 42%, iDRAC health status hijau.',
                'foto' => '1708484114_WhatisNetworkSwitch_TypesofNetworkSwitchesExplained.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'idperangkat' => 10,
                'idlaporanmonitoring' => 4,
                'lokasi' => 'Pilar Island C Baris 3',
                'catatan' => 'Sinkronisasi jadwal penerbangan real-time normal, tidak ada flicker atau pixel defect.',
                'foto' => '1708479248_Pylonwithlotsofcctv_Thefutureofsurveillance(1).jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('monitoring_perangkat')->insert($monPerangkat);

        // 5. Seed Monitoring Checklists status
        $monChecklists = [
            ['idmonitoring' => 1, 'checklist' => '12', 'status' => 'OK', 'idmonitoringperangkat' => 1],
            ['idmonitoring' => 1, 'checklist' => '13', 'status' => 'OK', 'idmonitoringperangkat' => 1],
            ['idmonitoring' => 1, 'checklist' => '14', 'status' => 'OK', 'idmonitoringperangkat' => 1],

            ['idmonitoring' => 2, 'checklist' => '19', 'status' => 'OK', 'idmonitoringperangkat' => 2],
            ['idmonitoring' => 2, 'checklist' => '20', 'status' => 'OK', 'idmonitoringperangkat' => 2],
            ['idmonitoring' => 2, 'checklist' => '21', 'status' => 'OK', 'idmonitoringperangkat' => 2],
            ['idmonitoring' => 2, 'checklist' => '22', 'status' => 'OK', 'idmonitoringperangkat' => 2],

            ['idmonitoring' => 3, 'checklist' => '1', 'status' => 'OK', 'idmonitoringperangkat' => 3],
            ['idmonitoring' => 3, 'checklist' => '2', 'status' => 'OK', 'idmonitoringperangkat' => 3],
            ['idmonitoring' => 3, 'checklist' => '3', 'status' => 'OK', 'idmonitoringperangkat' => 3],
            ['idmonitoring' => 3, 'checklist' => '4', 'status' => 'OK', 'idmonitoringperangkat' => 3],

            ['idmonitoring' => 4, 'checklist' => '23', 'status' => 'OK', 'idmonitoringperangkat' => 4],
            ['idmonitoring' => 4, 'checklist' => '24', 'status' => 'OK', 'idmonitoringperangkat' => 4],
            ['idmonitoring' => 4, 'checklist' => '25', 'status' => 'OK', 'idmonitoringperangkat' => 4],
        ];

        DB::table('monitoring_checklists')->insert($monChecklists);
    }
}
