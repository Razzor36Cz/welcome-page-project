import Navigation from '@/components/Navigation';
import { useLanguage } from '@/contexts/LanguageContext';
import { useAuth } from '@/contexts/AuthContext';
import { User, Briefcase, Mail } from 'lucide-react';

const About = () => {
  const { t } = useLanguage();
  const { isAdmin } = useAuth();

  const skills = [
    'Video Production',
    'Motion Graphics',
    'Sound Design',
    'Color Grading',
    'Photography',
    'Digital Art',
  ];

  return (
    <div className="min-h-screen bg-background">
      <Navigation />
      
      <main className="pt-32 pb-20 px-6">
        <div className="container mx-auto max-w-4xl">
          {/* Header */}
          <div className="text-center mb-16 animate-fade-in-up">
            <h1 className="font-display text-4xl md:text-6xl aluminum-text mb-4">
              {t('aboutMe')}
            </h1>
            <div className="w-24 h-px bg-gradient-to-r from-transparent via-aluminum to-transparent mx-auto" />
          </div>

          {/* Profile Section */}
          <div className="aluminum-surface rounded-2xl p-8 md:p-12 mb-8 animate-fade-in">
            <div className="flex items-start gap-6 mb-8">
              <div className="w-16 h-16 rounded-full bg-aluminum/10 flex items-center justify-center flex-shrink-0">
                <User className="w-8 h-8 text-aluminum" />
              </div>
              <div>
                <h2 className="font-display text-2xl text-foreground mb-2">{t('biography')}</h2>
                <p className="text-muted-foreground leading-relaxed" contentEditable={isAdmin}>
                  {t('biographyText')}
                </p>
              </div>
            </div>
          </div>

          {/* Skills Section */}
          <div className="aluminum-surface rounded-2xl p-8 md:p-12 mb-8 animate-fade-in-delayed">
            <div className="flex items-start gap-6">
              <div className="w-16 h-16 rounded-full bg-aluminum/10 flex items-center justify-center flex-shrink-0">
                <Briefcase className="w-8 h-8 text-aluminum" />
              </div>
              <div className="flex-1">
                <h2 className="font-display text-2xl text-foreground mb-6">{t('skills')}</h2>
                <div className="flex flex-wrap gap-3">
                  {skills.map((skill, index) => (
                    <span
                      key={skill}
                      className="px-4 py-2 rounded-full border border-aluminum/20 text-sm text-muted-foreground hover:text-foreground hover:border-aluminum/40 transition-all duration-300"
                      style={{ animationDelay: `${index * 0.1}s` }}
                    >
                      {skill}
                    </span>
                  ))}
                </div>
              </div>
            </div>
          </div>

          {/* Contact Section */}
          <div className="aluminum-surface rounded-2xl p-8 md:p-12 animate-fade-in-delayed">
            <div className="flex items-start gap-6">
              <div className="w-16 h-16 rounded-full bg-aluminum/10 flex items-center justify-center flex-shrink-0">
                <Mail className="w-8 h-8 text-aluminum" />
              </div>
              <div>
                <h2 className="font-display text-2xl text-foreground mb-2">{t('contact')}</h2>
                <p className="text-muted-foreground">
                  contact@portfolio.com
                </p>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  );
};

export default About;
