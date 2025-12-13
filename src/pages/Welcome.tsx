import { useState, useRef, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { Button } from '@/components/ui/button';
import { useLanguage, Language } from '@/contexts/LanguageContext';
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { Globe } from 'lucide-react';

const languages: Language[] = ['EN', 'FR', 'DE', 'CZ', 'PL'];

const Welcome = () => {
  const [videoEnded, setVideoEnded] = useState(false);
  const [showButton, setShowButton] = useState(false);
  const videoRef = useRef<HTMLVideoElement>(null);
  const navigate = useNavigate();
  const { t, language, setLanguage } = useLanguage();

  useEffect(() => {
    if (videoEnded) {
      const timer = setTimeout(() => setShowButton(true), 300);
      return () => clearTimeout(timer);
    }
  }, [videoEnded]);

  const handleVideoEnd = () => {
    setVideoEnded(true);
  };

  const handleEnter = () => {
    navigate('/home');
  };

  return (
    <div className="fixed inset-0 bg-background overflow-hidden">
      {/* Language Selector - Top Right */}
      <div className="absolute top-6 right-6 z-50">
        <DropdownMenu>
          <DropdownMenuTrigger asChild>
            <Button 
              variant="ghost" 
              size="sm" 
              className="gap-2 text-foreground/60 hover:text-foreground border border-aluminum/20 hover:border-aluminum/40 transition-all"
            >
              <Globe className="w-4 h-4" />
              <span className="text-xs tracking-wider">{language}</span>
            </Button>
          </DropdownMenuTrigger>
          <DropdownMenuContent className="bg-card/95 backdrop-blur-md border-aluminum/20">
            {languages.map((lang) => (
              <DropdownMenuItem
                key={lang}
                onClick={() => setLanguage(lang)}
                className={`cursor-pointer ${language === lang ? 'aluminum-text' : ''}`}
              >
                {lang}
              </DropdownMenuItem>
            ))}
          </DropdownMenuContent>
        </DropdownMenu>
      </div>

      {/* Video Background */}
      <video
        ref={videoRef}
        className="absolute inset-0 w-full h-full object-cover"
        autoPlay
        muted
        playsInline
        onEnded={handleVideoEnd}
      >
        <source src="/videos/welcome.mp4" type="video/mp4" />
      </video>

      {/* Overlay */}
      <div className="absolute inset-0 bg-gradient-to-t from-background via-background/20 to-transparent" />

      {/* Enter Button - Appears after video ends */}
      {showButton && (
        <div className="absolute inset-0 flex items-center justify-center">
          <div className="text-center animate-fade-in-up">
            <h1 className="font-display text-5xl md:text-7xl aluminum-text mb-12 tracking-wide">
              {t('welcome')}
            </h1>
            <Button
              variant="enter"
              size="xl"
              onClick={handleEnter}
              className="animate-scale-in"
            >
              {t('enter')}
            </Button>
          </div>
        </div>
      )}

      {/* Skip button for development */}
      {!videoEnded && (
        <button
          onClick={() => setVideoEnded(true)}
          className="absolute bottom-6 right-6 text-muted-foreground/50 hover:text-muted-foreground text-xs tracking-wider transition-colors"
        >
          Skip →
        </button>
      )}
    </div>
  );
};

export default Welcome;
