<script setup lang="ts">
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import type { NavItemsGroup } from '@/types';
import { Link } from '@inertiajs/vue3';
import { BookA, LayoutGrid } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';
import NavMain from './NavMain.vue';

const mainNavItems: NavItemsGroup[] = [
    {
        name: 'Platform',
        items: [
            {
                title: 'Dashboard',
                href: route('admin.dashboard'),
                icon: LayoutGrid,
                isActive: route().current('admin.dashboard'),
            },
        ],
    },
    {
        name: 'Mini Games',
        items: [
            {
                title: 'Wordle',
                href: route('admin.minigames.wordle.index'),
                icon: BookA,
                isActive: route().current('admin.minigames.wordle.*'),
            },
        ],
    },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('admin.dashboard')">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :categories="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
