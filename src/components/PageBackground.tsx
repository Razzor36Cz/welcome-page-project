import { BackgroundType } from '@/hooks/usePageBackground';

interface PageBackgroundProps {
  background: { type: BackgroundType; url: string } | null;
}

const PageBackground = ({ background }: PageBackgroundProps) => {
  if (!background) return null;

  if (background.type === 'video') {
    return (
      <div className="fixed inset-0 -z-10 overflow-hidden">
        <video
          src={background.url}
          autoPlay
          loop
          muted
          playsInline
          className="absolute inset-0 w-full h-full object-cover"
        />
        <div className="absolute inset-0 bg-background/80 backdrop-blur-sm" />
      </div>
    );
  }

  return (
    <div 
      className="fixed inset-0 -z-10 bg-cover bg-center bg-no-repeat"
      style={{ backgroundImage: `url(${background.url})` }}
    >
      <div className="absolute inset-0 bg-background/80 backdrop-blur-sm" />
    </div>
  );
};

export default PageBackground;
