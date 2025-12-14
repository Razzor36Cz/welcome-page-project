import Navigation from '@/components/Navigation';
import { useLanguage } from '@/contexts/LanguageContext';
import { useAuth } from '@/contexts/AuthContext';
import { User, Briefcase, Mail } from 'lucide-react';
import { usePageBackground } from '@/hooks/usePageBackground';
import PageBackground from '@/components/PageBackground';
import AdminBackgroundUploader from '@/components/AdminBackgroundUploader';
import EditableText from '@/components/EditableText';

const About = () => {
  const { t } = useLanguage();
  const { isAdmin } = useAuth();
  const { background, updateBackground, clearBackground } = usePageBackground('about');

  const skills = [
    'Video Production',
    'Motion Graphics',
    'Sound Design',
    'Color Grading',
    'Photography',
    'Digital Art',
  ];

  return (
    <div className="min-h-screen bg-background relative">
      <PageBackground background={background} />
      <Navigation />
      
      <main className="pt-32 pb-20 px-6">
        <div className="container mx-auto max-w-4xl">
          {/* Header */}
          <div className="text-center mb-16 animate-fade-in-up">
            <EditableText as="h1" className="font-display text-4xl md:text-6xl aluminum-text mb-4">
              {t('aboutMe')}
            </EditableText>
            <div className="w-24 h-px bg-gradient-to-r from-transparent via-aluminum to-transparent mx-auto" />
          </div>

          {/* Profile Section */}
          <div className="aluminum-surface rounded-2xl p-8 md:p-12 mb-8 animate-fade-in">
            <div className="flex items-start gap-6 mb-8">
              <div className="w-16 h-16 rounded-full bg-aluminum/10 flex items-center justify-center flex-shrink-0">
                <User className="w-8 h-8 text-aluminum" />
              </div>
              <div>
                <EditableText as="h2" className="font-display text-2xl text-foreground mb-2">{t('biography')}</EditableText>
                <EditableText as="p" className="text-muted-foreground leading-relaxed">
                  {t('biographyText')}
                </EditableText>
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
                <EditableText as="h2" className="font-display text-2xl text-foreground mb-6">{t('skills')}</EditableText>
                <div className="flex flex-wrap gap-3">
                  {skills.map((skill, index) => (
                    <EditableText
                      key={skill}
                      as="span"
                      className="px-4 py-2 rounded-full border border-aluminum/20 text-sm text-muted-foreground hover:text-foreground hover:border-aluminum/40 transition-all duration-300"
                    >
                      {skill}
                    </EditableText>
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
                <EditableText as="h2" className="font-display text-2xl text-foreground mb-2">{t('contact')}</EditableText>
                <EditableText as="p" className="text-muted-foreground">
                  contact@jaganosai.com
                </EditableText>
              </div>
            </div>
          </div>
        </div>
      </main>

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

export default About;
