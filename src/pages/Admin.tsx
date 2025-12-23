import { useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import Navigation from '@/components/Navigation';
import { useLanguage } from '@/contexts/LanguageContext';
import { useAuth } from '@/contexts/AuthContext';
import { Upload, Image, Video, FileText, Settings, BarChart3 } from 'lucide-react';
import { Button } from '@/components/ui/button';

const Admin = () => {
  const { t } = useLanguage();
  const { isAdmin } = useAuth();
  const navigate = useNavigate();

  useEffect(() => {
    if (!isAdmin) {
      navigate('/admin-login');
    }
  }, [isAdmin, navigate]);

  if (!isAdmin) return null;

  const adminSections = [
    { icon: Video, title: 'Manage Videos', description: 'Upload, edit, or delete videos', path: '/videos' },
    { icon: Image, title: 'Manage Photos', description: 'Upload, edit, or delete photos', path: '/videos' },
    { icon: FileText, title: 'Edit Content', description: 'Update text and descriptions', path: '/about' },
    { icon: BarChart3, title: 'Performance', description: 'View website analytics and statistics', path: '/performance' },
    { icon: Settings, title: 'Settings', description: 'Configure site settings', path: '/admin' },
  ];

  return (
    <div className="min-h-screen bg-background">
      <Navigation />
      
      <main className="pt-32 pb-20 px-6">
        <div className="container mx-auto max-w-4xl">
          {/* Header */}
          <div className="text-center mb-16 animate-fade-in-up">
            <h1 className="font-display text-4xl md:text-6xl aluminum-text mb-4">
              {t('adminPanel')}
            </h1>
            <div className="w-24 h-px bg-gradient-to-r from-transparent via-aluminum to-transparent mx-auto" />
          </div>

          {/* Quick Actions */}
          <div className="aluminum-surface rounded-2xl p-6 md:p-8 mb-8 animate-fade-in">
            <h2 className="font-display text-xl text-foreground mb-6 flex items-center gap-3">
              <Upload className="w-5 h-5 text-aluminum" />
              Quick Upload
            </h2>
            <div className="flex flex-wrap gap-4">
              <Button variant="luxury" className="gap-2">
                <Video className="w-4 h-4" />
                Upload Video
              </Button>
              <Button variant="luxury" className="gap-2">
                <Image className="w-4 h-4" />
                Upload Photo
              </Button>
            </div>
          </div>

          {/* Admin Sections */}
          <div className="grid md:grid-cols-2 gap-6">
            {adminSections.map((section, index) => (
              <button
                key={section.title}
                onClick={() => navigate(section.path)}
                className="aluminum-surface rounded-xl p-6 text-left hover:glow-effect transition-all duration-300 animate-fade-in"
                style={{ animationDelay: `${index * 0.1}s` }}
              >
                <div className="flex items-start gap-4">
                  <div className="w-12 h-12 rounded-full bg-aluminum/10 flex items-center justify-center flex-shrink-0">
                    <section.icon className="w-5 h-5 text-aluminum" />
                  </div>
                  <div>
                    <h3 className="font-display text-lg text-foreground mb-1">
                      {section.title}
                    </h3>
                    <p className="text-muted-foreground text-sm">
                      {section.description}
                    </p>
                  </div>
                </div>
              </button>
            ))}
          </div>

          {/* Info Note */}
          <div className="mt-8 text-center text-muted-foreground text-sm">
            <p>Tip: Navigate to any page to edit content directly when logged in as admin.</p>
          </div>
        </div>
      </main>
    </div>
  );
};

export default Admin;
