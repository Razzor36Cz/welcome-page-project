import Navigation from '@/components/Navigation';
import { useLanguage } from '@/contexts/LanguageContext';
import { useAuth } from '@/contexts/AuthContext';
import { Link } from 'react-router-dom';
import { ArrowRight } from 'lucide-react';
import { usePageBackground } from '@/hooks/usePageBackground';
import PageBackground from '@/components/PageBackground';
import AdminBackgroundUploader from '@/components/AdminBackgroundUploader';
import EditableText from '@/components/EditableText';

const Home = () => {
  const { t } = useLanguage();
  const { isAdmin } = useAuth();
  const { background, updateBackground, clearBackground } = usePageBackground('home');

  const sections = [
    { path: '/about', label: 'aboutMe', description: 'Discover my story and journey' },
    { path: '/videos', label: 'videoGallery', description: 'Watch my latest creations' },
    { path: '/music', label: 'music', description: 'Listen to featured tracks' },
    { path: '/prompt', label: 'prompt', description: 'Explore creative prompts' },
  ];

  return (
    <div className="min-h-screen bg-background relative">
      <PageBackground background={background} />
      <Navigation />
      
      {/* Hero Section */}
      <section className="pt-32 pb-20 px-6">
        <div className="container mx-auto text-center">
          <EditableText as="h1" className="font-display text-5xl md:text-7xl lg:text-8xl aluminum-text mb-6 animate-fade-in-up">
            Creative Portfolio
          </EditableText>
          <EditableText as="p" className="text-muted-foreground text-lg md:text-xl max-w-2xl mx-auto animate-fade-in-delayed font-light tracking-wide">
            Video • Music • Digital Art
          </EditableText>
        </div>
      </section>

      {/* Featured Sections Grid */}
      <section className="pb-20 px-6">
        <div className="container mx-auto">
          <div className="grid md:grid-cols-2 gap-6">
            {sections.map((section, index) => (
              <Link
                key={section.path}
                to={section.path}
                className="group aluminum-surface rounded-xl p-8 md:p-12 transition-all duration-500 hover:glow-effect"
                style={{ animationDelay: `${index * 0.1}s` }}
              >
                <div className="flex items-center justify-between">
                  <div>
                    <h2 className="font-display text-2xl md:text-3xl text-foreground mb-2 group-hover:aluminum-text transition-all duration-300">
                      {t(section.label)}
                    </h2>
                    <EditableText as="p" className="text-muted-foreground text-sm tracking-wide">
                      {section.description}
                    </EditableText>
                  </div>
                  <ArrowRight className="w-6 h-6 text-aluminum opacity-0 group-hover:opacity-100 transform translate-x-0 group-hover:translate-x-2 transition-all duration-300" />
                </div>
              </Link>
            ))}
          </div>
        </div>
      </section>

      {/* Decorative Element */}
      <div className="fixed bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-aluminum/30 to-transparent" />

      {isAdmin && (
        <AdminBackgroundUploader
          onUpload={updateBackground}
          onClear={clearBackground}
          hasBackground={!!background}
        />
      )}
    </div>
  );
};

export default Home;
