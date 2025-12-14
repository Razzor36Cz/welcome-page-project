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
    navigate('/music');
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

      {/* Overlay - stronger at bottom for button visibility */}
      <div className="absolute inset-0 bg-gradient-to-t from-background via-background/30 to-transparent" />

      {/* Enter Button - Reveals at bottom after video ends */}
      <div 
        className={`absolute bottom-0 left-0 right-0 flex flex-col items-center justify-end pb-16 md:pb-24 transition-all duration-1000 ${
          showButton ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-20 pointer-events-none'
        }`}
      >
        {/* Decorative line */}
        <div 
          className={`w-px h-20 bg-gradient-to-b from-transparent to-aluminum/50 mb-8 transition-all duration-700 delay-300 ${
            showButton ? 'opacity-100 scale-y-100' : 'opacity-0 scale-y-0'
          }`}
          style={{ transformOrigin: 'top' }}
        />
        
        <Button
          variant="enter"
          size="xl"
          onClick={handleEnter}
          className={`transition-all duration-700 delay-500 ${
            showButton ? 'opacity-100 scale-100' : 'opacity-0 scale-90'
          }`}
        >
          {t('enter')}
        </Button>

        {/* Subtle hint text */}
        <p 
          className={`mt-6 text-muted-foreground/50 text-xs tracking-[0.2em] uppercase transition-all duration-700 delay-700 ${
            showButton ? 'opacity-100' : 'opacity-0'
          }`}
        >
          {t('welcome')}
        </p>
      </div>

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
