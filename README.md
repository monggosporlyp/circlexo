![CircleXO](https://raw.githubusercontent.com/circelxo/circelxo/master/arts/cover.jpg)

# CircleXO: Unified Business Workflow Management

Welcome to CircleXO, an open-source platform designed to streamline your team's workflow by integrating essential tools into a single, easy-to-use interface. CircleXO connects Jira, GitHub, Discord, Stripe, RevenueCat, and OpenAI, providing a comprehensive solution for managing your business processes all from one place.

Built with modern technologies like Laravel, FilamentPHP, Livewire, Vue.js, Laravel Starter Kit, and Wave 3 Kit, CircleXO offers a robust and scalable architecture tailored for high-performance and seamless user experiences.

---

## Overview

CircleXO aims to simplify the complexities of modern business operations by offering a unified interface that enhances productivity, fosters collaboration, and provides real-time insights into your business performance. Whether you're managing projects, collaborating with your team, or automating repetitive tasks, CircleXO has you covered.

### Key Features

- **Unified Dashboard**: Access all your essential tools and data sources in one place.
- **Real-Time Updates**: Stay informed with real-time notifications and updates.
- **Automated Workflows**: Streamline your business processes with automated workflows.
- **Collaboration Tools**: Communicate and collaborate with your team seamlessly.
- **Data Analytics**: Gain insights into your business performance with advanced analytics.
- **Custom Integrations**: Connect with popular services like Jira, GitHub, Discord, and more.
- **Scalable Architecture**: Built with modern technologies for high performance and scalability.
- **Open-Source**: Customize and extend the platform to suit your unique business needs.
- **Easy to Use**: Intuitive interface designed for ease of use and user satisfaction.
- **Secure & Reliable**: Built with security in mind to protect your data and privacy.
- **Community Support**: Join a vibrant community of developers and users for help and collaboration.
- **Continuous Updates**: Regular updates and improvements to enhance the platform's functionality.
- **Mobile Responsive**: Access the platform on any device with a responsive design.
- **Developer-Friendly**: Extend and customize the platform with ease using modern technologies.
- **Cost-Effective**: Reduce costs and improve efficiency with a single platform for all your needs.
- **API-Driven**: Built with APIs for seamless integration with other services and tools.
- **Documentation**: Comprehensive documentation to help you get started and make the most of the platform.
- **Feedback & Support**: Provide feedback and get support from the community and the development team.

### Roadmap

- [ ] **User Management**: Manage users, roles, and permissions with ease.
- [ ] **Integrations & Plugins**: Connect with popular services and extend the platform with plugins.
- [ ] **Github Integration**: Integrate with Github for code management and version control.
- [ ] **Discord Integration**: Connect with Discord for team communication and collaboration.
- [ ] **Jira Integration**: Integrate with Jira for project management and issue tracking.
- [ ] **Stripe Integration**: Connect with Stripe for payment processing and revenue management.
- [ ] **RevenueCat Integration**: Integrate with RevenueCat for subscription management and analytics.
- [ ] **OpenAI Integration**: Connect with OpenAI for AI-powered automation and insights.
- [ ] **AWS Integration**: Integrate with AWS for cloud services and infrastructure management.
- [ ] **Vapor Integration**: Connect with Vapor for serverless deployment and scaling.
- [ ] **Forge Integration**: Integrate with Forge for server management and deployment.
- [ ] **Ploi Integration**: Connect with Ploi for server management and deployment.
- [ ] **Task Management**: Create, assign, and track tasks for your team.
- [ ] **Project Management**: Manage projects, milestones, and deadlines effectively.
- [ ] **Reporting & Analytics**: Generate reports and analyze data to make informed decisions.
- [ ] **Automation & Workflows**: Automate repetitive tasks and streamline your workflows.
- [ ] **Data Analytics**: Generate reports and analyze data to make informed decisions.

### Technology Stack

- **Backend**: Laravel 12
- **Admin Panel**: FilamentPHP 3.3
- **Real-Time UI**: Livewire 3.5
- **Database**: MySQL 8.0 / SQLite 3.0 / Postgres 17.0
- **Real-Time Communication**: Laravel Reverb
- **Frontend Components**: Vue.js 3.2
- **UI Kit**: Wave 3 Kit

---

## Getting Started

### Prerequisites

- PHP (v8.2 or higher)
- Composer
- Node.js (v22 or higher)
- MySQL/SQLite/Postgres or any compatible database
- Basic understanding of Laravel and Vue.js

### Installation

```bash
composer create-project circlexo/circlexo my-project
```
update your environment variables in `.env` file

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=circlexo
DB_USERNAME=root
DB_PASSWORD=

# Discord Bot / Notifications Options
DISCORD_CLIENT_ID=
DISCORD_CLIENT_SECRET=
DISCORD_URL=
DISCORD_WEBHOOK=
DISCORD_ERROR_WEBHOOK=
DISCORD_OTP_WEBHOOK=
DISCORD_ERROR_WEBHOOK_ACTIVE=true
DISCORD_APPLICATION_ID=
DISCORD_PUBLIC_KEY=
DISCORD_BOT_TOKEN=
DISCORD_REPORTS_WEBHOOK=
DISCORD_JIRA_WEBHOOK=

# Github Services Connect
GITHUB_CLIENT_ID=
GITHUB_CLIENT_SECRET=
GITHUB_URL=
GITHUB_USERNAME=
GITHUB_TOKEN=

# Google Services Connect
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_CALLBACK=
GOOGLE_CREDENTIALS=

# Google Analytics
ANALYTICS_PROPERTY_ID=
ANALYTICS_CREDENTIALS=

# Jira Services Connect
JIRA_APP_ID=
JIRA_REDIRECT_URI=
JIRA_CLIENT_ID=
JIRA_CLIENT_SECRET=
JIRA_USERNAME=
JIRA_PROJECT_KEY=
JIRA_HOST=
JIRA_EMAIL=
JIRA_TOKEN=
JIRA_BOARD=

# Stripe Services Connect
STRIPE_SECRET=

# RevenueCat Services Connect
REVENUE_CAT_API_KEY=
REVENUE_CAT_PROJECT_ID=

# OpenAI Services Connect
OPENAI_API_KEY=
OPENAI_ASSISTANT_ID=
OPENAI_ORGANIZATION=

# VAPOR Services Connect
VAPOR_API_KEY=
VAPOR_TEAM_ID=

# Webhook Secret
WEBHOOK_SECRET=
```

now you need to build your frontend 

```bash
php artisan filament:assets
php artisan livewire:publish --assets
npm i
npm run build
```

it's time for data 

```bash
php artisan migrate
php artisan db:seed
php artisan optimize
composer dev
```

## Contributing

We welcome contributions from the community! Whether you're a developer, designer, or simply have ideas to improve CircleXO, we'd love to hear from you. Please follow these guidelines:

1. **Fork the Repository**: Create a fork of the main repository.
2. **Create a Branch**: Work on a new branch for your feature or fix.
3. **Submit a Pull Request**: Once your changes are ready, submit a pull request for review.

### Development Guidelines

- Follow the existing code style and conventions.
- Write clear and concise commit messages.
- Include tests for new features or bug fixes.

---

## Documentation

For detailed information on each integration, configuration options, and advanced usage, please refer to our [official documentation](https://circlexo.readthedocs.io).

---

## License

CircleXO is released under the MIT License. See [LICENSE](LICENSE) for more information.

---

## Contact

For any questions, feedback, or support, feel free to reach out to us via:

- Email: [Fady Mondy](mailto:info@3x1.io)
- GitHub Discussions: [Discuss on GitHub](https://github.com/circlexo/circlexo/discussions)

---

Thank you for choosing CircleXO! We hope this platform empowers your team to achieve more together.
