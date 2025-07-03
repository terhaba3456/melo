# MELO Roma - Casino Affiliate Platform

## Overview

MELO Roma is a casino affiliate platform built with a modern full-stack architecture. The application displays casino sponsors, banners, channels, and deals in an attractive interface with admin management capabilities. It features a Turkish-language interface optimized for casino affiliate marketing.

## System Architecture

### Frontend Architecture
- **Framework**: React 18 with TypeScript
- **Routing**: Wouter for client-side routing
- **State Management**: TanStack Query (React Query) for server state
- **UI Framework**: Shadcn/ui components with Radix UI primitives
- **Styling**: Tailwind CSS with custom casino theme colors
- **Build Tool**: Vite for fast development and bundling

### Backend Architecture
- **Runtime**: Node.js with Express.js
- **Language**: TypeScript with ES modules
- **API Design**: RESTful API with JWT authentication
- **Session Management**: Express sessions with PostgreSQL store
- **File Structure**: Modular route handling with centralized storage interface

### Data Storage Solutions
- **Database**: PostgreSQL with Neon serverless driver
- **ORM**: Drizzle ORM for type-safe database queries
- **Schema Management**: Drizzle Kit for migrations and schema push
- **File Storage**: Static assets stored in attached_assets directory

## Key Components

### Database Schema
- **Users**: Admin authentication system
- **Banners**: Promotional banners with carousel functionality
- **Sponsors**: Casino sponsors categorized as VIP, reliable, or new
- **Channels**: Telegram channels with member counts
- **Deals**: New partnership deals with bonus information
- **Settings**: Application configuration and branding
- **Stats**: User statistics and site metrics

### Frontend Components
- **Banner Component**: Auto-rotating banner carousel with smooth transitions
- **SponsorCard**: Interactive sponsor cards with category-based styling
- **Sidebar**: Mobile-responsive navigation menu
- **PopupModal**: Promotional popup with timed display
- **StatsSection**: Real-time statistics display
- **Admin Panel**: Full CRUD interface for content management

### Authentication System
- JWT-based authentication for admin access
- Protected routes for administrative functions
- Session persistence with secure cookie handling

## Data Flow

1. **Client Request**: Frontend makes API requests through TanStack Query
2. **Authentication**: JWT tokens validated for protected endpoints
3. **Database Query**: Drizzle ORM executes type-safe database operations
4. **Response**: JSON data returned to client with error handling
5. **State Update**: React Query manages cache and UI updates
6. **UI Render**: Components re-render with updated data

## External Dependencies

### Core Dependencies
- **@neondatabase/serverless**: PostgreSQL connection for Neon database
- **drizzle-orm**: Type-safe database ORM
- **@tanstack/react-query**: Server state management
- **@radix-ui/***: Headless UI components
- **tailwindcss**: Utility-first CSS framework
- **wouter**: Lightweight React router
- **jsonwebtoken**: JWT token handling
- **bcrypt**: Password hashing (configured for future use)

### Development Tools
- **tsx**: TypeScript execution for development
- **esbuild**: Fast bundling for production
- **vite**: Development server and build tool
- **drizzle-kit**: Database schema management

## Deployment Strategy

### Development Environment
- **Server**: Node.js with tsx for TypeScript execution
- **Client**: Vite dev server with HMR
- **Database**: Neon PostgreSQL with connection pooling
- **File Serving**: Static assets served from attached_assets

### Production Build
- **Client Build**: Vite builds optimized React bundle to dist/public
- **Server Build**: esbuild bundles Express server to dist/index.js
- **Asset Management**: Static files served alongside application
- **Environment**: Production mode with optimized configurations

### Configuration Management
- Environment variables for database connection
- JWT secret configuration
- Drizzle configuration for PostgreSQL dialect
- Tailwind configuration for custom theme

## Changelog
```
Changelog:
- July 02, 2025. Initial setup with Node.js + React + TypeScript
- July 02, 2025. Added admin login system with credentials (meloroma/sametkoc34)
- July 02, 2025. Reorganized sponsors into 4 categories with 8 sponsors each:
  * VIP Sponsorlar (vip-sponsorlar)
  * Ana Sponsorlar (ana-sponsorlar) 
  * Güvenilir Sponsorlar (guvenilir-sponsorlar)
  * Rasgorun Oynadığı Siteler (rasgorun-oynadigi)
- July 03, 2025. CRITICAL: Converted to PHP + HTML + CSS + JavaScript for CyberPanel hosting
- July 03, 2025. Cleaned up all Node.js files, kept only PHP deployment files
- July 03, 2025. Ready for sosyalfidex.xyz domain deployment
```

## User Preferences
```
Preferred communication style: Simple, everyday language.
```